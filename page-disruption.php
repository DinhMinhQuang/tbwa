<?php /* Template Name: Disruption */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <?php wp_head(); ?>
</head>

<body class="dark">
   <?php get_header(); ?>
   <section id="disruption">
      <div id="disruption-splash" class="grid-container">
         <div class="row" id="splash-landing">
            <div class="columns large-offset-5 large-9 medium-offset-3 small-14 small-offset-0 end">
               <div class="slanted-container small-no-slant">
                  <h1>Convention is</h1>
                  <h1>for squares</h1>
                  <div class="slanted-block ">
                     <span>
                        We don&#039;t follow cultural and market conventions — we overturn them. We anticipate future
                        trends to determine what could lift a brand higher, and then define a Disruption® platform to
                        get them there.
                     </span>

                  </div>
                  <div class="slanted-button ">
                     <h4 id="disruption-video-watch">Watch</h4>
                  </div>
               </div>
            </div>
         </div>
         <!--/.#splash-landing-->
         <img src="/wordpress/wp-content/themes/tbwa/assets/images/arrow.svg" class="down-arrow" />
         <article id="disruption-video-player">
            <video id="disruption-video" class="video-js vjs-default-skin" controls preload="auto" data-setup=''>
                  <source src="https://d2rijh2vqznvtd.cloudfront.net/assets/videos/disruption.mp4" type="video/mp4">
            </video>
         </article>
         <!--/#video-player-->
      </div>
      <article id="disruption-content">
         <div id="methods" class="grid-container">
            <div class="row">
               <div class="columns large-offset-2 medium-offset-1 medium-3">
                  <div id="anchor-links">
                     <a href="#dlive">Disruption Live</a> <a href="#backslash">Backs\ash</a> <a href="#edges">Edges</a>
                  </div>
               </div>
               <div class="columns medium-9 small-14 end">
                  <div class="slanted-container small-no-slant">
                     <h3>There&#039;s madness to our methods</h3>
                     <div class="slanted-block">
                        <span>
                           We&#039;ve developed methodologies to keep our brands as top-of-mind as the culture in which
                           they live.
                        </span>

                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="columns medium-offset-2 medium-10">
                  <video id="software-video" class="video-js vjs-default-skin vjs-fluid" controls preload="none"
                     poster='https://www.tbwa.com.vn/' data-setup=''>
                     <source src="https://d2rijh2vqznvtd.cloudfront.net/assets/videos/software.mp4" type="video/mp4">
                  </video>
               </div>
            </div>
         </div>
         <div id="dlive" class="grid-container">
            <div class="row">
               <div class="columns large-offset-1 medium-10 small-14">
                  <div class="slanted-container small-no-slant">
                     <h2>Disruption Live</h2>
                     <h3>Connecting at the speed of culture</h3>
                     <div class="slanted-block">
                        <span>
                           Disruption Live is our system for identifying triggers in culture that are meaningful to our
                           clients&#039; brands. We interpret these triggers in real time, and then determine the
                           course of action in order for the brand to be responsive and relevant. That course of action
                           could be a tweet, or it could be a PR stunt, the beginning of a campaign, or a new product
                           development. It can be anything. And not necessarily always executed by us.
                        </span>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/#dlive-->
         <div class="row bg-light grid-container" id="backslash-container">
            <div id="backslash">
               <div class="row" id="backslash-copy">
                  <div class="columns xlarge-offset-3 medium-8 large-offset-2 small-13 small-offset-0 end">
                     <div class="slanted-container small-no-slant">
                        <img src="/wordpress/wp-content/themes/tbwa/assets/images/backs_ash.png" />
                        <h3>A daily hit of culture</h3>
                        <div class="slanted-block">
                              Our competition is culture. And culture never stands still. That’s why we created
                              Backs\ash, our cultural editorial unit. Insights from across the globe are delivered to
                              our 11,300 employees every day, which allow us to inject cultural input into every
                              creative output.
                        </div>
                     </div>
                     <div id="backslash-phone">
                        <img src="/wordpress/wp-content/themes/tbwa/assets/images/backslash_phone.png" />
                     </div>
                  </div>
               </div>
               <div class="row" id="backslash-vid">
                  <div class="columns large-offset-4 large-9 small-offset-0 small-14 end">
                     <video id="backslash-video" class="video-js vjs-default-skin vjs-fluid" controls preload="none"
                        poster="/wordpress/wp-content/themes/tbwa/assets/images/backslash_vid.jpg" data-setup=''>
                        <source src="http://d2rijh2vqznvtd.cloudfront.net/assets/videos/backslash.mp4" type="video/mp4">
                     </video>
                  </div>
               </div>
            </div>
         </div>
         <!--/.row-->
         <div id="edges" class="grid-container">
            <div class="row">
               <div class="columns xlarge-offset-3 medium-offset-4 medium-10 small-13 small-offset-0 end">
                  <div class="slanted-container small-no-slant">
                     <h3>Trendspotting on steroids</h3>
                     <div class="slanted-block">
                        <span>
                           Fempowerment. Empathy Age. The Rise of the Machines. These are just a few of the 50+
                           cultural shifts that we&#039;ve identified to help brands find their place in culture.

                        </span>
                     </div>
                     <a href="https://backslash.com/2021edges" target="_blank">Download the Edges</a>
                  </div>
               </div>
            </div>
            <div id="edges-map" class="grid-container">
               <img src="/wordpress/wp-content/themes/tbwa/assets/images/edges_map.png" />
            </div>
         </div>
         <!--/#edges-->
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