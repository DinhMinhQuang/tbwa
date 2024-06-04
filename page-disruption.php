<?php /* Template Name: Disruption */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php the_title() ?> - <?php echo get_bloginfo('name'); ?></title>
   <link rel="shortcut icon" href="https://www.tbwa.com.vn/img/favicon.ico" type="image/x-icon">
   <?php wp_head(); ?>
</head>

<body class="dark">
   <?php get_header(); ?>
   <section id="disruption">
      <?php
      $featured_image_id = get_post_meta(get_the_ID(), 'featured_image_id', true); // Lấy ID của hình ảnh nổi bật
      $featured_image_url = wp_get_attachment_image_url($featured_image_id, 'full'); // Lấy đường dẫn đến hình ảnh theo kích thước 'full'
      ?>
      <div id="disruption-splash" class="grid-container"
         style="background-image: url(<?php echo esc_url($featured_image_url); ?>);">
         <div class="row" id="splash-landing">
            <div class="columns large-offset-5 large-9 medium-offset-3 small-14 small-offset-0 end">
               <div class="slanted-container small-no-slant">
                  <?php
					$custom_title_disruption = get_post_meta($post->ID, 'custom_title_disruption', true);

					if (!empty($custom_title_disruption)) {
						$parts = explode(' ##### ', $custom_title_disruption);

						foreach ($parts as $part) {
							$part = trim($part);
							if (!empty($part)) {
								echo '<h1>' . $part . '</h1>';
							}
						}
					} else {
						echo '<h1>' . get_the_title() . '</h1>';
					}
					?>
                  <div class="slanted-block ">
                        <?php
                        $custom_text = get_post_meta(get_the_ID(), 'custom_text', true);
                        echo wp_kses_post($custom_text); // Sử dụng wp_kses_post để xử lý văn bản và ngăn chặn các mã độc hại
                        ?>

                  </div>
                  <div class="slanted-button ">
                     <h4 id="disruption-video-watch">Watch</h4>
                  </div>
               </div>
            </div>
         </div>
         <!--/.#splash-landing-->
         <img src="/wp-content/themes/tbwa/assets/images/arrow.svg" class="down-arrow" />
         <article id="disruption-video-player">
            <video id="disruption-video" class="video-js vjs-default-skin" controls preload="auto" data-setup=''>
               <source src="<?php echo get_theme_mod('slider_video_disruption_url'); ?>" type="video/mp4">
            </video>
         </article>
         <!--/#video-player-->
      </div>
      <article id="disruption-content">
         <div id="methods" class="grid-container">
            <div class="row">
               <div class="columns large-offset-2 medium-offset-1 medium-3">
                  <div id="anchor-links">
                     <?php
                     for ($i = 1; $i <= 3; $i++) {
                        $anchor_link = get_post_meta(get_the_ID(), 'anchor_links' . $i, true);
                        if (!empty($anchor_link)) {
                           echo '<a href="#section-' . $i . '">' . esc_html($anchor_link) . '</a> ';
                        }
                     }
                     ?>
                  </div>
               </div>
               <div class="columns medium-9 small-14 end">
                  <div class="slanted-container small-no-slant">
                     <h3><?php echo esc_html(get_post_meta(get_the_ID(), 'methods_title', true)); ?></h3>
                     <div class="slanted-block">
                        <?php echo wp_kses_post(get_post_meta(get_the_ID(), 'methods_content', true)); ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="columns medium-offset-2 medium-10 methods_video">
	<?php
      $methods_image_id = get_post_meta(get_the_ID(), 'methods_image_id', true); // Lấy ID của hình ảnh nổi bật
      $methods_image_url = wp_get_attachment_image_url($methods_image_id, 'full'); // Lấy đường dẫn đến hình ảnh theo kích thước 'full'
      ?>
				   <div id="methods_video_parent">
					   <div class="methods_video_img_overlay"></div>
					   <div id="methods_video_img" class="vid-cover video-js" style="background-image: url('<?php echo esc_url($methods_image_url); ?>');">
						   <div class="image-darken" ></div>
						   <button id="methods_video_play" class="vjs-big-play-button" type="button" aria-live="polite" title="Play Video" aria-disabled="false"><span class="vjs-control-text">Play Video</span></button>
						</div>
				   </div>
				   <div id="methods-video-player">
					  <video id="software-video" class="video-js vjs-default-skin vjs-fluid" controls preload="none"
						 poster='/' data-setup=''>
						 <source src="<?php echo esc_url(get_post_meta(get_the_ID(), 'methods_video', true)); ?>"
							type="video/mp4">
					  </video>
				   </div>
               </div>
            </div>
         </div>
         <div class="disruption-about" id="backslash-container">
            <div class="disruption-about-container">
               <div class="disruption-about-flex">
                  <?php
                  $title_about_video_disruption = get_post_meta($post->ID, 'title_about_video_disruption', true);
                  $text_about_video_disruption = get_post_meta($post->ID, 'text_about_video_disruption', true);
                  $about_video_disruption = get_post_meta($post->ID, 'about_video_disruption', true);
                  ?>
                  <div class="col-lg-5">
                     <div class="disruption-about-content">
                        <div class="width-narrow"></div>
                        <h3 class="disruption-about-content-title">
                           <?php echo esc_html($title_about_video_disruption); ?>
                        </h3>
                        <p><?php echo esc_html($text_about_video_disruption); ?></p>
                     </div>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4">
                     <div class="disruption-about-video">
                        <video width="400" height="300" autoplay loop muted playsinline>
                           <source src="<?php echo esc_url($about_video_disruption); ?>" type="video/mp4" />
                        </video>
                     </div>
                  </div>
               </div>
               <div class="disruption-about-flex">
                  <?php
                  $featured_image_about_id1 = get_post_meta($post->ID, 'featured_image_about_id_1', true);
                  $featured_image_about1 = wp_get_attachment_image_src($featured_image_about_id1, 'full');
                  $title_about_disruption1 = get_post_meta($post->ID, 'title_about_disruption1', true);
                  $text_about_disruption1 = get_post_meta($post->ID, 'text_about_disruption1', true);
                  ?>
                  <div class="col-lg-5">
                     <div class="disruption-about-img">
                        <img decoding="async" src="<?php echo esc_url($featured_image_about1[0]); ?>" alt=""
                           loading="eager" width="960" height="540">
                     </div>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4">
                     <div class="disruption-about-content">
                        <div class="width-narrow"></div>
                        <h3 class="disruption-about-content-title"><?php echo esc_html($title_about_disruption1); ?>
                        </h3>
                        <p><?php echo esc_html($text_about_disruption1); ?></p>
                     </div>
                  </div>
               </div>
               <div class="disruption-about-flex">
                  <?php
                  $featured_image_about_id2 = get_post_meta($post->ID, 'featured_image_about_id_2', true);
                  $featured_image_about2 = wp_get_attachment_image_src($featured_image_about_id2, 'full');
                  $title_about_disruption2 = get_post_meta($post->ID, 'title_about_disruption2', true);
                  $text_about_disruption2 = get_post_meta($post->ID, 'text_about_disruption2', true);
                  ?>
                  <div class="col-lg-4">
                     <div class="disruption-about-content">
                        <div class="width-narrow"></div>
                        <h3 class="disruption-about-content-title"><?php echo esc_html($title_about_disruption2); ?>
                        </h3>
                        <p><?php echo esc_html($text_about_disruption2); ?></p>
                        <!--<a href="/" class="disruption-about-btn">
                           <span>Our commitment</span>
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                              style="enable-background:new 0 0 24 24" xml:space="preserve" class="arrowIcon">
                              <path d="M12.9 9.7v2.6H2.7V9.7h10.2zM9.6 3.1h3.7l7.9 7.9-7.9 7.9H9.6l7.9-7.9-7.9-7.9z">
                              </path>
                           </svg>
                        </a>-->
                     </div>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-5">
                     <div class="disruption-about-img">
                        <img decoding="async" src="<?php echo esc_url($featured_image_about2[0]); ?>" alt=""
                           title="diversity-people" loading="eager" width="960" height="540">
                     </div>
                  </div>
               </div>
               <div class="disruption-about-flex">
                  <?php
                  $featured_image_about_id3 = get_post_meta($post->ID, 'featured_image_about_id_3', true);
                  $featured_image_about3 = wp_get_attachment_image_src($featured_image_about_id3, 'full');
                  $title_about_disruption3 = get_post_meta($post->ID, 'title_about_disruption3', true);
                  $text_about_disruption3 = get_post_meta($post->ID, 'text_about_disruption3', true);
                  ?>
                  <div class="col-lg-5">
                     <div class="disruption-about-img">
                        <img decoding="async" src="<?php echo esc_url($featured_image_about3[0]); ?>"
                           alt="A collage of photos showing scenes from TBWA's Disruption Day. workshops."
                           title="Disruption-Days" loading="eager" width="960" height="540">
                     </div>

                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4">
                     <div class="disruption-about-content">
                        <div class="width-narrow"></div>
                        <h3 class="disruption-about-content-title"><?php echo esc_html($title_about_disruption3); ?>
                        </h3>
                        <p><?php echo esc_html($text_about_disruption3); ?> </p>
                     </div>
                  </div>
               </div>
               <div class="disruption-about-flex disruption-about-understanding2">
                  <?php
                  $featured_image_about_id4 = get_post_meta($post->ID, 'featured_image_about_id_4', true);
                  $featured_image_about4 = wp_get_attachment_image_src($featured_image_about_id4, 'full');
                  $title_about_disruption4 = get_post_meta($post->ID, 'title_about_disruption4', true);
                  $text_about_disruption4 = get_post_meta($post->ID, 'text_about_disruption4', true);
                  ?>
                  <div class="col-lg-5">
                     <div class="disruption-about-content">
                        <div class="width-narrow"></div>
                        <h3 class="disruption-about-content-title"><?php echo esc_html($title_about_disruption4); ?>
                        </h3>
						 <p><?php echo esc_html($text_about_disruption4); ?></p>
                        <h3 class="disruption-about-desc hide">
                           <?php echo esc_html($text_about_disruption4); ?>
                        </h3>
                     </div>
                  </div>
                  <div class="col-lg-2"></div>
                  <div class="col-lg-4">
					  <!--<div class="wp-block-tbwa-blocks-image-animated-sprite proportion-original media-type-image"
						   data-sprite-url="<?php echo str_replace('-scaled.jpg', '.jpg', $featured_image_about4[0]) ; ?>">
						  <div class="sprite"></div>
					  </div>-->
                     <div class="disruption-about-img">
                        <img decoding="async" src="<?php echo esc_url($featured_image_about4[0]); ?>" alt=""
                           title="diversity-people" loading="eager" width="960" height="540">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </article>
   </section>
   <!--/#disruption-->
   <?php get_template_part('footer-script'); ?>
   <?php get_footer(); ?>
   <?php
   wp_footer();
   ?>
</body>

</html>
<?php

?>