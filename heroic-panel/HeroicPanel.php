<?php
/**
 * HeroicPanel.php
 *
 * @package colbycomms/heroic-panel
 */

namespace ColbyComms\HeroicPanel;

/**
 * Sets up the plugin.
 */
class HeroicPanel {
	/**
	 * Whether to load production assets.
	 *
	 * @var bool
	 */
	const PROD = true ;

	/**
	 * Plugin text domain.
	 *
	 * @var string
	 */
	const TEXT_DOMAIN = 'heroic-panel';

	/**
	 * Vendor name.
	 *
	 * @var string
	 */
	const VENDOR = 'colbycomms';

	/**
	 * Version.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * String preceding this plugin's filter.
	 *
	 * @var string
	 */
	const FILTER_NAMESPACE = 'colbycomms__heroic_panel__';

	/**
	 * Filter name for whether to enqueue this plugin's style.
	 *
	 * @var string
	 */
	const ENQUEUE_STYLE_FILTER = self::FILTER_NAMESPACE . 'enqueue_style';

	/**
	 * Filter name for this plugin's dist directory.
	 *
	 * @var string
	 */
	const DIST_DIRECTORY_FILTER = self::FILTER_NAMESPACE . 'dist_directory';

	/**
	 * The plugin's shortcode tag.
	 */
	const SHORTCODE_TAG = 'heroic-panel';

	/**
	 * Add hooks.
	 */
	public function __construct() {
		add_action( 'init', [ __CLASS__, 'register_shortcode' ] );
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_style' ] );
		add_filter( 'template_redirect', [ __CLASS__, 'maybe_disable_style' ] );
	}

	/**
	 * Adds the shortcode.
	 */
	public static function register_shortcode() {
		add_shortcode( self::SHORTCODE_TAG, [ Block::class, 'render' ] );
	}

	/**
	 * Enqueue the stylesheet.
	 */
	public static function enqueue_style() {
		/**
		 * Filters whether to enqueue this plugin's stylesheet.
		 *
		 * @param bool Yes or no.
		 */
		if ( apply_filters( self::ENQUEUE_STYLE_FILTER, true ) !== true ) {
			return;
		}

		$min  = self::PROD === true ? '.min' : '';
		$dist = self::get_dist_directory();
		wp_enqueue_style(
			self::TEXT_DOMAIN,
			"$dist/" . self::TEXT_DOMAIN . "$min.css",
			[],
			self::VERSION
		);
	}

	/**
	 * Disable the stylesheet if the shortcode is not present.
	 */
	public static function maybe_disable_style() {
		global $post;

		if ( empty( $post ) ) {
			return;
		}

		if ( has_shortcode( $post->post_content, self::SHORTCODE_TAG ) ) {
			return;
		}

		add_filter(
			self::ENQUEUE_STYLE_FILTER, function() {
				return false;
			}, 1
		);
	}

	/**
	 * Gets the plugin's dist/ directory URL, whether this package is installed as a plugin
	 * or in a theme via composer. If the package is in neither of those places and the filter
	 * is not used, this whole thing will fail.
	 *
	 * @return string The URL.
	 */
	public static function get_dist_directory() : string {
		/**
		 * Filters the URL location of the /dist directory.
		 *
		 * @param string The URL.
		 */
		$dist = apply_filters( self::DIST_DIRECTORY_FILTER, '' );
		if ( ! empty( $dist ) ) {
			return $dist;
		}

		if ( file_exists( dirname( __DIR__, 3 ) . '/plugins' ) ) {
			return plugin_dir_url( dirname( __DIR__ ) . '/index.php' ) . 'dist';
		}

		return get_template_directory_uri() . '/vendor/' . self::VENDOR . '/' . self::TEXT_DOMAIN . '/dist/';
	}

}
