<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <style class="vjs-styles-defaults">
    .video-js {
      width: 300px;
      height: 150px;
    }

    .vjs-fluid {
      padding-top: 56.25%
    }
  </style>
  <style class="vjs-styles-dimensions">
    .video-dimensions {
      width: 300px;
      height: 300px;
    }

    .video-dimensions.vjs-fluid {
      padding-top: 56.25%;
    }
  </style>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="description"
    content="TBWA is The Disruption® Company. Named Adweek’s 2018 Global Agency of the Year, our collective has 11,300 creative minds across 270 offices in 95 countries.">
  <link rel="shortcut icon" href="https://www.tequila.com.vn/img/favicon.ico" type="image/x-icon">
  <!-- Open Graph tags to customize link previews -->
  <meta property="og:url" content="https://www.tbw.com.vn/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="TBWA">
  <!--<meta property="fb:app_id" content="1731508873846176" />-->

  <?php wp_head(); ?>

  <!-- google fonts for language support
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext" rel="stylesheet">
 -->

</head>

<body class="dark homepage">
  <div id="js_cookieNotice" class="cookieNotice" >
    <div class="cookieNotice__container">
      <p>
        This website uses cookies to improve your experience.
      </p>
      <p>
        <a id="js_cookieNotice_accept" href="#">Accept</a>
        <a href="/wordpress/privacy-policy">Privacy Policy</a>
      </p>

    </div>
  </div>
  <?php get_header(); ?>
  <?php get_template_part( 'index' ); ?>
  
  <!--/#main-container-->
  <?php get_footer(); ?>

  <?php get_template_part( 'footer-script' ); ?>
  <?php
  wp_footer();
  ?>
</body>

</html>