<?php
/**
 * Template Name: Custom Category News
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

    <?php
    $category = get_term_by('slug', 'news', 'category');
    if (!$category)
        echo "Category Not Found";
    ?>
    <section id="news-archive">
        <div class="grid-container">
            <article class="section-intro">
                <div class="row">
                    <div
                        class="columns xxlarge-offset-5 xlarge-offset-4 xlarge-6 large-offset-3 large-7 medium-offset-2 medium-8 small-offset-1 small-13">
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

            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 10,
                'category_name' => 'news',
                'paged' => $paged,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $query = new WP_Query($args);
            $sizes = ["large-6", "large-5", "large-5", "large-6"];
            if ($query->have_posts()) {
                $totalPosts = $query->found_posts;
                $post_count = 0;
                while ($query->have_posts() && $post_count < $totalPosts) {
                    $query->the_post(); // Thêm dòng này để thiết lập dữ liệu của bài viết hiện tại
                    $index = $post_count % count($sizes);
                    $currentSize = $sizes[$index];
                    $div = "<div class='columns $currentSize medium-10 small-14 large-offset-1";
                    $childDiv = "<div class='work-entry";
                    if ($post_count % 2 === 0) {
                        echo "<div class='row'>\n";
                    }
                    if ($post_count % 2 === 0) {
                        $div .= "'>\n";
                        $childDiv .= "'>\n";
                    } else {
                        $div .= "\tend'>\n";
                        $childDiv .= "\tentry-middle'>\n";
                    }
                    echo $div;
                    echo $childDiv;
                    ?>
                    <?php

                    $redirectUrl = get_post_meta(get_the_ID(), 'redirectUrl', true);

                    if (empty($redirectUrl)) {
                        $redirectUrl = get_permalink();
                    }
                    ?>

                    <a href="<?php echo $redirectUrl; ?>" alt="<?php the_title(); ?>" <?php
                         $newTab = get_post_meta(get_the_ID(), 'redirectUrl', true);
                         if (!empty($newTab)) {
                             echo "target='_blank'";
                         }
                         ?>>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title(); ?>" />
                    </a>
                    <div>
                        <h3 class="entry-date"><?php echo get_post_meta(get_the_ID(), 'date', true); ?></h3>
                        <a class="entry-headline" href="<?php echo $redirectUrl; ?>" alt="<?php the_title(); ?>" <?php
                             $newTab = get_post_meta(get_the_ID(), 'redirectUrl', true);
                             if (!empty($newTab)) {
                                 echo "target='_blank'";
                             }
                             ?>>
                            <?php the_title(); ?>
                            <?php
                            $test = get_post_meta(get_the_ID(), 'redirectUrl', true);
                            if (!empty($test)) {
                                echo "<img class='link-arrow' src='/wordpress/wp-content/themes/tbwa/assets/images/link.svg' />";
                            }
                            ?>
                        </a>
                        <h4 class="entry-location"><?php echo get_post_meta(get_the_ID(), 'location', true); ?></h4>
                        <p class="entry-body">
                            <?php echo trim(get_the_excerpt()); ?>
                        </p>
                    </div>
                </div>
                </div>
                <?php
                if ($post_count % 2 !== 0) {
                    echo "</div>\n";
                }
                $post_count++;
                }
                ?>
            </div>
            <div class="row pagination">
                <?php
                // Hiển thị phân trang
                $big = 999999999; // need an unlikely integer
                $pagination_links = paginate_links(
                    array(
                        'type' => 'array',
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $query->max_num_pages,
                        "prev_text" => "&lt;",
                        "next_text" => "&gt;"
                    )
                );

                // Khởi tạo biến để kiểm tra xem thay thế đã được thực hiện cho "Previous" hay "Next" chưa
                $replacedPrevious = false;
                $replacedNext = false;

                if ($pagination_links) {
                    // Lặp qua từng liên kết
                    foreach ($pagination_links as $link) {
                        // Nếu liên kết là số trang hiện tại
                        if (strpos($link, 'current') !== false) {
                            // In ra số trang hiện tại bằng thẻ <span>
                            echo "<span class='current'>" . strip_tags($link) . "</span>";
                        } else {
                            echo $link;
                        }
                    }
                }
                wp_reset_postdata();
            }
            ?>
        </div>
        <!--/.row pagination-->
    </section>
    <?php get_template_part('footer-script'); ?>


    <?php get_footer(); ?>
    <?php
    wp_footer();
    ?>
</body>

</html>