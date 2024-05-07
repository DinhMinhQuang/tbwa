<section id="landing-container" class="row collapse">
   <article id="landing-video" class="full-width-video">
      <video poster="" id="landing-vid" playsinline autoplay muted loop>
         <source src="<?php echo wp_get_attachment_url(get_theme_mod('banner_video')) ?>" type="video/mp4">
      </video>
      <article class="video-overlay" id="homepage">
         <div class="vertical-align">
            <h1 class="font-light">
               <?php
               $attributes = get_language_attributes('html');
               preg_match('/lang="([^"]+)"/', $attributes, $matches);
               $lang_attribute_value = isset($matches[1]) ? $matches[1] : '';
               $lang_prefix = ($lang_attribute_value === 'vi_VN') ? '_vi' : '';

               $homepage_text_1 = get_theme_mod("homepage_text_line_1{$lang_prefix}", '');
               $homepage_text_2 = get_theme_mod("homepage_text_line_2{$lang_prefix}", '');
               $homepage_text_3 = get_theme_mod("homepage_text_line_3{$lang_prefix}", '');
               $homepage_text_4 = get_theme_mod("homepage_text_line_4{$lang_prefix}", '');

               echo '<p>' . esc_html($homepage_text_1) . '</p>';
               echo '<p>' . esc_html($homepage_text_2) . '</p>';
               echo '<p>' . wp_kses_post($homepage_text_3) . '</p>';
               echo '<p>' . esc_html($homepage_text_4) . '</p>'; ?>
            </h1>
            <a href="/#" class="slanted-button bg-light" id="tbwa-videos">
               <h4>Watch</h4>
            </a>
         </div>
         <img src="/wp-content/themes/tbwa/assets/images/arrow_white.svg" class="down-arrow" alt="Scroll Down">
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
   <?php get_template_part("home-pirates") ?>
   <!--/#home-pirates-->
</section>
<!--/#main-container-->