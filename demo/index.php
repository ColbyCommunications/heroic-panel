<?php

register_shutdown_function( function() {
    print_r( error_get_last() );
} );

$options = [
    'background-image' => 'http://www.colby.edu/commencement/wp-content/uploads/sites/200/2013/12/commencement-header-2017-hats-01.jpg'
];

$content = '<div class="container">
<div class="row bg-white">
    <div class="col-md-9" style="padding-bottom: 2.25rem;">
        <div class="py-4 px-3">
            <h1>Congratulations, Class of 2017</h1>

            <p>On a memorable day at Colby, 47th vice president Joseph R. Biden Jr. implores graduates to value dignity and
                humanity as they shape the world.
                <a style="padding-left: .25rem; font-size: .841rem; text-transform: uppercase;" href="http://www.colby.edu/news/2017/05/21/colby-confers-degrees-to-478-graduates-during-196th-commencement-ceremony/">More</a>
            </p>


            <iframe style="max-width: 100%;" src="https://player.vimeo.com/video/218534669" width="640" height="360" frameborder="0"
                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
    </div>
    <div class="col-md-3">
        <div class="py-4">
            <h2 class="h5">Commencement</h2>
            <ul class="my-nav list-unstyled">
                <li>
                    <a href="http://www.colby.edu/commencement/2017-commencement-gallery/">
                        Gallery
                    </a>
                </li>
                <li>
                    <a href="http://www.colby.edu/commencement/livestream/">
                        Livestream Replay
                    </a>
                </li>
                <li>
                    <a href="http://www.colby.edu/commencement/speakers-honorands/">
                        Honorary Degree Recipients
                    </a>
                    <ul>
                        <li>
                            <a href="http://www.colby.edu/commencement/speakers-honorands/#biden">
                                Joseph R. Biden, Jr.
                            </a>
                        </li>
                        <li>
                            <a href="http://www.colby.edu/commencement/speakers-honorands/#walter">
                                Amy Walter \'91
                            </a>
                        </li>
                        <li>
                            <a href="http://www.colby.edu/commencement/speakers-honorands/#takishita">
                                Yoshihiro Takishita
                            </a>
                        </li>
                        <li>
                            <a href="http://www.colby.edu/commencement/speakers-honorands/#washington">
                                Warren Washington
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="http://www.colby.edu/commencement/2017-commencement-speakers-address/">
                        Commencement Speaker\'s Address
                    </a>
                </li>
                <li>
                    <a href="http://www.colby.edu/commencement/2017-class-speakers-address/">
                        Class Speaker\'s Address
                    </a>
                </li>
            </ul>
            <h2 class="h5">Baccalaureate</h2>
            <ul class="my-nav list-unstyled">
                <li>
                    <a href="http://www.colby.edu/news/2017/05/20/amy-walter-advises-colby-seniors-to-define-what-matters/">Recap</a>
                </li>
                <li>
                    <a href="http://www.colby.edu/commencement/2017-baccalaureate-gallery/">Gallery</a>
                </li>
                <li>
                    <a href="https://www.facebook.com/colbycollege/videos/10158854490190245/">Music Performance</a>
                </li>
            </ul>
            <h2 class="h5">More</h2>
            <ul class="my-nav list-unstyled">
                <li>
                    <a href="https://vimeo.com/218646163">CAPS Graduation</a>
                </li>
                <li>
                    <a href="http://www.colby.edu/commencement/senior-snapshots/">Senior Snapshots</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>';

require dirname( __DIR__ ) . '/vendor/autoload.php';

?><!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=0" />
<link rel="stylesheet" href="https://unpkg.com/bootstrap@4.0.0/dist/css/bootstrap.css" />
<link rel="stylesheet" href="../dist/heroic-panel.css" />
<title>
	Heroic Panel
</title>
<style>
*, *:after, *:before {
	box-sizing: border-box;
}

body {
    margin: 0;
}

a, a:hover, a:visited {
    color: #002878;
}

main {
    font-family: sans-serif;
}

.my-nav {
    font-size: 94.4%;
}

.the-rest {
    padding: 3rem 1.5rem;
    max-width: 768px;
    margin: 0 auto;
    line-height: 1.682;
    font-size: 112%;
}
</style>
<main>
	<?php echo ColbyComms\HeroicPanel\Block::render( $options, $content ); ?>
    <div class="the-rest">
        <h2>The rest of the page</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer elementum massa vel ligula congue, ac tincidunt nisl luctus. Aliquam massa elit, tincidunt ut dolor id, porta tempor orci. Nulla condimentum ut risus sed vulputate. Suspendisse in nunc viverra, blandit elit nec, scelerisque turpis. Etiam sollicitudin orci dui, eu pellentesque sem vulputate ut. Suspendisse consectetur imperdiet suscipit. Duis convallis lobortis arcu, quis mollis neque varius eget. Morbi iaculis vehicula ante. Curabitur molestie odio sed aliquet dictum. Maecenas sed faucibus lectus. Vivamus nec auctor nisl. Quisque neque lectus, facilisis ornare varius vel, lobortis nec odio. Nam convallis nulla vitae nulla tristique, at aliquet velit semper. Praesent eget lectus vel turpis dictum egestas. Nulla placerat dolor vel tempor pretium. Morbi dictum posuere dui sit amet euismod.

        <p>Sed eget venenatis lacus, ac viverra mi. Nulla scelerisque nulla lacus. In suscipit facilisis maximus. Proin placerat purus in mi porta, vitae ullamcorper odio tristique. Suspendisse a turpis et mi dictum convallis ut non est. Proin consectetur sem dolor, eu ornare enim consectetur nec. Nam sit amet odio dictum eros ultricies convallis in in est. Pellentesque lobortis quis elit at gravida. Donec non quam posuere, interdum sem nec, porttitor arcu. Sed auctor fermentum diam, in aliquet mauris porta vitae. Aenean sit amet nibh ac lectus sodales vehicula imperdiet et mi. Fusce neque lectus, consequat non sagittis eget, pellentesque nec tellus. Aenean sit amet felis velit.

        <p>Ut sollicitudin non lectus eget ullamcorper. Aliquam sagittis sollicitudin finibus. In euismod, metus quis imperdiet aliquam, nibh lectus consequat enim, eget commodo purus turpis dapibus massa. Mauris sit amet varius diam, sit amet viverra diam. Sed aliquet ut nulla at eleifend. Mauris vulputate dui a sapien malesuada dapibus. Cras rhoncus at ligula et volutpat. Vestibulum quam lacus, venenatis eu laoreet at, facilisis quis quam. Curabitur tristique porta neque, vitae lobortis tellus eleifend nec. Ut consequat arcu eu sapien fermentum commodo. Integer fermentum maximus malesuada.

        <p>Duis est nisi, ultrices et leo eget, faucibus imperdiet risus. Ut tristique turpis non lorem tristique, sed iaculis augue porta. Sed euismod cursus turpis, ac rutrum nisi semper viverra. Cras efficitur metus nec ligula sagittis aliquam. Donec eu gravida magna. Proin libero odio, vestibulum sit amet massa quis, sagittis fermentum felis. Etiam sem dolor, pharetra vel lacinia a, vehicula ac diam. Curabitur sit amet dictum erat. Donec vitae erat dictum risus iaculis convallis a tempor mauris.

        <p>Cras luctus odio non pulvinar tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempus leo sit amet purus fermentum, sit amet tincidunt velit vulputate. Vestibulum ornare metus ut lectus molestie pulvinar. Cras et dolor sed orci malesuada laoreet. Proin laoreet nec magna id vestibulum. Pellentesque ac odio eu velit commodo tristique nec eget diam.
    </div>
</main>