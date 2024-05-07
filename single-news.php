<?php
/**
 * Template Name: Single News
 *
 * This template is used to display a custom single interface.
 */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title() ?> - <?php echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body class="light ">
    <?php get_header(); ?>
    <?php get_template_part('cookie-notice'); ?>
    <?php
    $post_slug = get_post_field('post_name', get_post());
    $post = get_page_by_path($post_slug, OBJECT, 'post');
    ?>
    <article id="news-article-container" class="bg-light grid-container">
        <div class="row masthead">
            <div class="large-6 columns large-offset-1 medium-offset-1 medium-12">
                <img src="<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'meta_box_section_thumbnail_field', true)); ?>" />
            </div>

            <div class="large-6 columns end large-offset-0 medium-offset-1 medium-12">
                <div class="news-headline">
                    <h1 class="title">
                        <?php echo get_the_title($post->ID); ?>
                    </h1>
                    <h2 class="location">
                        <?php echo get_post_meta($post->ID, 'location', true); ?>
                    </h2>
                    <h3 class="date">
                        <?php echo get_the_time('F d, Y'); ?>
                    </h3>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="columns medium-offset-1 medium-12">
                <div class="blurb">
                    <?php echo trim(get_the_excerpt($post->ID)) ?>
                </div>
                <p></p>
            </div>
        </div>

        <!--/.row-->
        <div class="row">

        </div>
        <!--/.row -->

        <div class="row">
            <div class="columns medium-offset-1 medium-12">
            </div>
        </div>
    </article>
    <!--/.news-container-->

    <?php get_template_part('footer-script'); ?>

    <?php get_footer(); ?>
    <?php
    wp_footer();
    ?>
</body>

</html>