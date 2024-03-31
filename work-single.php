<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>

<body class="dark single-article">
    <?php get_header(); ?>
    <section id="featured-media">
        <div class="vid-cover"
            style="background-image:url(/wordpress/wp-content/themes/tbwa/assets/images/Ảnh-chụp-Màn-hình-2020-09-08-lúc-12.21.20.png)">
            <div class="image-darken" />
        </div>
        <div class="featured-media-overlay">
            <div class="client-date">
                <span class="client">Viettel ST</span><span class="location"></span>
            </div>
            <div class="headline">
                <h1>Feel Free For Data, Just &quot;15k&quot;</h1>
            </div>
            <!-- headline -->
            <a href="#" alt="Feel Free For Data, Just &quot;15k&quot;" class="slanted-button" id="watch-vid-work">
                <h4>Watch</h4>
            </a>
        </div>
        </div>
        <!--/.vid-cover-->
        <div class="vid-container">
            <div id="vid-wrapper">
                <iframe id="article-featured-video"
                    data-url="https://player.vimeo.com/video/455432012?dnt=1&autoplay=0&api=1" frameborder="0"
                    webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay"></iframe>
                <div id="frame-shield"></div>
            </div>
            <div class="vid-controls">
                <div class="vid-play">
                    <a href="#" id="vid-play-btn">play</a>
                </div>
                <!--/.vid-play-->
                <div class="vid-progress" id="vid-progress-bar">
                    <span class="meter"></span>
                    <span class="progress-dot"></span>
                </div>
                <!--/.vid-progress-->
                <div class="vid-fullscreen">
                    <a href="#" id="fullscreen">fullscreen video</a>
                </div>
                <!--/.vid-fullscreen-->
                <div class="vid-close">
                    <a href="#" id="vid-close">close video</a>
                </div>
                <!--/.vid-close-->
            </div>
            <!--/.vid-controls-->
        </div>
        <!--/.vid-container-->
    </section>
    <!--/#featured-media-->
    <div id="article-slash"></div>
    <!-- end slash -->
    <section id="article-content">
        <div class="grid-container">
            <div class="row">
                <div class="small-offset-2 xlarge-5 large-6 medium-8 small-11 columns">
                    <div id="main-copy">
                        <div class="blurb">What's your wifi password?</div>
                        <div class="article-copy">There is no doubt that everyone in us did once experienced the moments
                            when asking for the wifi password. The unique - funny experiences only have in Vietnam- from
                            the unusual types of passwords name: we don’t have wifi, no password,… to awful actions or
                            enraged feeling when you try to “hunt” the weak wifi signal.<br />
                            <br />
                            The Viettel Data ST 15K TVC series came out as the exploitation from humor sense regarding
                            the local daily life texture when asking for wifi passwords. From a boy use wifi asking as a
                            reason to approach his “crush” to the embarrassing moment when you step into a gorgeous
                            restaurant but have to “begging” for the wifi password. The TVC series has been received
                            great feedback from the audience when they can see themself in the TVC series - supporting
                            Viettel to increase their brand awareness and product interests.
                        </div>
                    </div>
                    <!--/.main-copy-->
                </div>
            </div>
            <div class="row" id="awards-share">
                <div class="large-1 large-offset-1 small-2 small-offset-2 columns article-share" style="display: none;">
                    <h2>Share</h2>
                </div>
                <div class="large-4 small-8 small-offset-1 medium-offset-0 columns end article-share"
                    style="display: none;">
                    <!-- 				<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
               --> <a href="https://twitter.com/intent/tweet?text=Viettel%20ST%20%22Feel%20Free%20For%20Data%2C%20Just%20%2215k%22%22%20by%20%40TBWA&url=https://www.tbwa.com.vn/work/tho%E1%BA%A3i-m%C3%A1i-data-ch%E1%BB%89-15k"
                        class="twitter-share">Share on Twitter</a>
                </div>
            </div>
            <div class="row">
                <div class=" ">
                    <div class="img-container ">
                        <img src="/wordpress/wp-content/themes/tbwa/assets/images/Ảnh-chụp-Màn-hình-2020-09-08-lúc-12.20.55.png" />
                    </div>
                </div>
                <div class=" ">
                    <div class="img-container ">
                        <img src="/wordpress/wp-content/themes/tbwa/assets/images/Ảnh-chụp-Màn-hình-2020-09-08-lúc-12.21.20.png" />
                    </div>
                </div>
            </div>
            <!--/.row -->
            <div class="row">
                <div class="columns large-14" id="back-to-parent">
                    <a href="https://www.tbwa.com.vn/work">More Work</a>
                </div>
            </div>
            <!--/.row -->
        </div>
        <!--/.grid-container-->
    </section>
    <?php get_template_part('footer-script'); ?>

    <?php get_footer(); ?>
    <?php
    wp_footer();
    ?>
</body>

</html>