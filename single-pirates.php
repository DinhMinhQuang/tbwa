<?php
/**
 * Template Name: Single Pirates
 *
 * This template is used to display a custom single interface.
 */ ?>
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
    <article id="leader-container" class="bg-dark grid-container">
        <div class="row leader">
            <div class="large-6 columns large-offset-1 leader-image">
                <img src="/wordpress/wp-content/themes/tbwa/assets/images/Ms-Tan_BW.jpg" />
            </div>
            <div class="large-5 columns leadership-headline">
                <h1 class="name">Tan Nguyen (Sunshine)</h1>
                <h2 class="title">Managing Director, TBWA\GroupVietnam</h2>
                <!--/.social-handles-->
            </div>
            <!--/.leadership-headline-->
            <div class="large-5 columns large-offset-0 end">
                <div class=" leadership-bio">
                    <p>Tan began her career in advertising as an Account Manager with Grey before moving to Pyramid
                        Consulting to capture the growing digital marketing landscape in Asia Pacific.</p>
                    <br />
                    <p>She joined TBWA\ in 2010 to lead the digital group in order to combine her digital experience
                        with her passion for advertising. <br /></p>
                    <br />
                    <p>With her promotion in 2017 to Managing Director, Tan’s responsibilities expanded to include the
                        leadership of Tequila, TBWA’s PR, Event, and Activation branch.<br /></p>
                    <br />
                    <p>In 2017, she was named Women to Watch, and TBWA won Silver Agency of The Year by Campaign Asia
                        under her leadership.</p>
                    <br />
                    <p>Outside of TBWA\, she runs around after her two little twins. <br /></p>
                </div>
                <!--/.leadership-bio-->
            </div>
        </div>
        <!--/.row-->
    </article>
    <?php get_template_part('footer-script'); ?>

    <?php get_footer(); ?>
    <?php
    wp_footer();
    ?>
</body>

</html>