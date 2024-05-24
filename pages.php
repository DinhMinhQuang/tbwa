<?php /* Template Name: Legacy Policy */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?> - <?php echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body class="dark">
    <?php get_header(); ?>
    <?php get_template_part('cookie-notice'); ?>
    <section class="single row">
        <div class="columns large-10 large-offset-2 medium-10 medium-offset-2 small-12 small-offset-1 end">
            <h1><?php the_title(); ?></h1>
            <?php
            $content = apply_filters('the_content', get_the_content());
            echo $content
                ?>
        </div>
    </section>
    <!--/.single-->
    <?php get_template_part('footer-script'); ?>
    <?php get_footer(); ?>
    <?php
    wp_footer();
    ?>
</body>

</html>