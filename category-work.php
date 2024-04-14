<?php
/**
 * Template Name: Custom Category Work
 */
?>
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
    <?php get_template_part('cookie-notice'); ?>
    <?php
    $category = get_term_by('slug', 'work', 'category');
    if (!$category)
        echo "Category Not Found";
    ?>

    <article id="work-landing" class="bg-light">
        <div id="work-splash"
            style="background-image:url(<?php echo get_term_meta($category->term_id, 'banner_image', true); ?> );">
            <div id="work-splash-copy" class="slanted-container small-no-slant">
                <div id="splash-title" class="slanted-block" style="color:white" ;>
                    <?php
                    // $category = get_term_by('slug', 'work', 'category');
                    $banner_title = get_term_meta($category->term_id, 'banner_title', true);
                    if ($banner_title) {
                        echo $banner_title;
                    } else {
                        echo "Banner Title Not Found";
                    }
                    ?>
                </div>
                <div class="slanted-button  white ">
                    <h4 id="work-video-watch">Watch</h4>
                </div>
            </div>
            <img src="/wordpress/wp-content/themes/tbwa/assets/images/arrow_white.svg" class="down-arrow" />
        </div>
        <!--/#work-splash-->
        <div id="work-video-container">
            <video id="work-video-player" class="video-js" height="300" width="300" controls preload="auto">
                <source src="<?php echo get_theme_mod('slider_video_work_url'); ?>" type="video/mp4">
            </video>
        </div>
        <!--/work-video-container-->
    </article>
    <article id="work-container" class="grid-container bg-light">
        <article class="section-intro">
            <div class="row">
                <div
                    class="columns xxlarge-offset-4 xlarge-offset-3 xlarge-9 large-offset-2 large-10 medium-offset-2 medium-11 small-offset-1 small-13">
                    <div class="slanted-container small-no-slant">
                        <h1>
                            <?php echo get_term_meta($category->term_id, 'title_intro', true); ?>
                        </h1>
                        <div class="slanted-block section-intro-copy">
                            <?php echo get_term_meta($category->term_id, 'description_intro', true); ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <div class="row">
            <?php
            $sizes = [
                "large-3",
                "large-5",
                "large-4",
                "large-5",
                "large-4",
                "large-3",
                "large-4",
                "large-3",
                "large-5",
            ];
            $middleIndices = [1, 4, 7, 10, 13];
            $rightIndices = [2, 5, 8, 11, 14];
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post', // Thay 'post' bằng kiểu bài viết tùy chỉnh của bạn nếu cần
                'posts_per_page' => 15,
                'category_name' => 'work',
                'paged' => $paged,
                'orderby' => 'date',
                'order' => 'DESC',
            );


            $query = new WP_Query($args);
            if ($query->have_posts()) {
                $totalPosts = $query->found_posts;
                for ($i = 0; $i < $totalPosts; $i++) {
                    $query->the_post();
                    $index = $query->current_post % count($sizes);
                    $string = "<div class='columns " . $sizes[$index];

                    $string .= "\tmedium-10 small-14";
                    if ($query->current_post % 3 == 0) {
                        $string .= "\tlarge-offset-1";
                    } else {
                        $string .= "\tlarge-offset-0";
                    }
                    if ($query->current_post % 2 != 0) {
                        $string .= "\tmedium-offset-4";
                    }

                    $childString = "<div class='work-entry";

                    if (in_array($query->current_post % 15, $middleIndices)) {
                        $childString .= "\tentry-middle";
                    } elseif (in_array($query->current_post % 15, $rightIndices)) {
                        $childString .= "\tentry-right";
                    }
                    if ($i === $totalPosts - 1) {
                        $string .= "\tend";
                    }

                    $string .= "'>";
                    $childString .= "'>";

                    echo $string . "\n";
                    echo $childString . "\n";

                    ?>
                    <a href="<?php echo get_permalink() ?>" alt="<?php echo str_replace(' ##### ', ' ', get_the_title()) ?>">
                        <img src="<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'meta_box_section_thumbnail_field', true)); ?>"
                            alt="<?php echo str_replace(' ##### ', ' ', get_the_title()) ?>" />
                    </a>
                    <div class="slanted-container">
                        <!-- <a href="https://www.tbwa.com.vn/work/thoải-mái-data-chỉ-15k"> -->
                        <h3 class="entry-client"><a href="<?php echo get_permalink() ?>"
                                alt="<?php echo str_replace(' ##### ', ' ', get_the_title()) ?>"><?php echo get_post_meta(get_the_ID(), 'client', true) ?></a>
                        </h3>
                        <h2 class="entry-title"><a href="<?php echo get_permalink() ?>"
                                alt="<?php echo str_replace(' ##### ', ' ', get_the_title()) ?>"><?php echo str_replace(' ##### ', ' ', get_the_title()) ?></a>
                        </h2>
                        <h4 class="entry-agency"><a href="<?php echo get_permalink() ?>"
                                alt="<?php echo str_replace(' ##### ', ' ', get_the_title()) ?>"></a></h4>
                        <!-- </a> -->
                    </div>
                </div>
                </div>
                <?php
                }
                // Hiển thị phân trang
                $big = 999999999; // need an unlikely integer
                echo paginate_links(
                    array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $query->max_num_pages
                    )
                );

                wp_reset_postdata();
            }
            ?>

        </div>
        <!--/.row-->
        <!-- pagination -->
    </article>
    <!--/#work-container-->

    <?php get_template_part('footer-script'); ?>


    <?php get_footer(); ?>
    <?php
    wp_footer();
    ?>
</body>

</html>