<section id="landing-container" class="row collapse">
   <article id="landing-video" class="full-width-video">
      <video poster="" id="landing-vid" playsinline autoplay muted loop>
         <source src="<?php echo wp_get_attachment_url(get_theme_mod('banner_video')) ?>" type="video/mp4">
      </video>
      <article class="video-overlay" id="homepage">
         <div class="vertical-align">
            <h1 class="font-light">
               <p>We Are</p>
               <p>The<br></p>
               <p>Disruption<sup>®</sup></p>
               <p>Company</p>
            </h1>
            <a href="/#" class="slanted-button bg-light" id="tbwa-videos">
               <h4>Watch</h4>
            </a>
         </div>
         <img src="/wordpress/wp-content/themes/tbwa/assets/images/arrow_white.svg" class="down-arrow"
            alt="Scroll Down">
      </article>
      <!--/.video-overlay-->
   </article>
   <!--/#landing-video-->
   <article id="main-video-player" class="player">
      <video id="video" class="video-js" height="300" width="300" controls preload="auto">
         <source src="https://d2rijh2vqznvtd.cloudfront.net/assets/videos/peopleandplaces.mp4" type="video/mp4">
      </video>
   </article>
   <!--/#video-player-->
   <div class="tbwa-player playlist" id="main-video-playlist">
   </div>
</section>
<!--/#landing-container-->
<section id="main-container" class="tbwa-homepage">
   <?php get_template_part("home-disruption") ?>
   <!--/#home-disruption-->
   <?php get_template_part("home-work") ?>
   <!--/#home-work-->
   <article id="home-pirates" class="bg-dark">
      <div class="row collapse">
         <div class="columns large-5 large-offset-5 medium-8 medium-offset-3 small-12 small-offset-1 end">
            <div class="slanted-container small-no-slant">
               <h2>Meet the Pirates</h2>
               <div class="slanted-block">
                  We are creative renegades. We take risks. We rewrite rules. We come up with brave ideas that take on
                  conventionally-steered ships.
               </div>
               <a href="/pirates">More Pirates</a>
            </div>
            <!--/.slanted-container-->
         </div>
         <!--/.columns-->
      </div>
      <!--/.row -->
      <div class="row collapse">
         <div class="columns large-14" id="pirates-image">
            <div id="heightz">
               <img src="/wordpress/wp-content/themes/tbwa/assets/images/piratesBG.jpg">
            </div>
         </div>
      </div>
      <!--/.row collapse-->
   </article>
   <!--/#home-pirates-->
</section>
<!--/#main-container-->