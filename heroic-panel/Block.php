<?php
/**
 * Block.php
 *
 * @package colbycomms/heroic-panel
 */

namespace ColbyComms\HeroicPanel;

/**
 * Renders the block.
 */
class Block {
	const OPTIONS_DEFAULTS = [];

	/**
	 * Checks whether the options are valid.
	 *
	 * @param array $options The options.
	 * @return boolean Whether they are valid.
	 */
	public static function options_are_valid( $options = [] ) : bool {
		if ( ! isset( $options['background-image'] ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Renders the block.
	 *
	 * @param array $options Shortcode $atts or a passed-in array.
	 * @param string $content Shortcode content or a passed-in HTML string.
	 * @return string The generated HTML.
	 */
	public static function render( $options = [], $content = '' ) : string {
		$options = array_merge( self::OPTIONS_DEFAULTS, $options );

		if ( empty( $content ) ) {
			return '';
		}

		if ( ! self::options_are_valid( $options ) ) {
			return '';
		}

		ob_start();
		?>
<div class="heroic-panel">
	<div class="heroic-panel__inner" style="background-image: url('<?php echo $options['background-image']; ?>');">
		<div class="heroic-panel__content-container">
			<?php echo $content; ?>
		</div>
	</div>
</div>
		<?php

		return ob_get_clean();
	}
}
