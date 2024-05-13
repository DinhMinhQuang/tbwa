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
    <title><?php the_title() ?> - <?php echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body class="dark">
    <?php get_header(); ?>
    <?php get_template_part('cookie-notice'); ?>
    <?php
    $post_slug = get_post_field('post_name', get_post());
    $post = get_page_by_path($post_slug, OBJECT, 'post');
    ?>
    <article id="leader-container" class="bg-dark grid-container">
        <div class="row leader">
            <div class="large-6 columns large-offset-1 leader-image">
                <img
                    src="<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'meta_box_section_thumbnail_field', true)); ?>" />
            </div>
            <div class="large-5 columns leadership-headline">
                <h1 class="name"><?php echo the_title(); ?></h1>
                <h2 class="title"><?php echo trim(the_excerpt()) ?></h2>
                <!--/.social-handles-->
            </div>
            <!--/.leadership-headline-->
            <div class="large-5 columns large-offset-0 end">
                <div class=" leadership-bio">
                    <?php
                    $content = get_the_content();
                    $content = apply_filters('the_content', $content);
                    echo $content;
                    ?>
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