<?php
/**
 * Template Name: Custom Category Pirates
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php single_cat_title(); ?> - <?php echo get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body class="dark">
    <?php get_header(); ?>
    <?php get_template_part('cookie-notice'); ?>
    <section id="pirates-intro">
        <?php
        // Lấy giá trị của 'banner_image' từ danh mục hiện tại
        $banner_image = get_term_meta(get_queried_object()->term_id, 'banner_image', true);
        ?>
        <article id="pirates-quote" style="background-image:url('<?php echo esc_url($banner_image); ?>' );">
            <div class="content">
                <h1>
                    <?php
                    // Lấy giá trị của 'banner_title' từ danh mục hiện tại
                    $banner_title = get_term_meta(get_queried_object()->term_id, 'banner_title', true);
                    ?>
                    <?php echo wp_kses_post($banner_title); ?>
                    <p><br></p>
                </h1>
                <div class="slanted-button ">
                    <h4 id="pirates-video-watch">Watch</h4>
                </div>
            </div>
            <!--/.content-->
            <img src="/wp-content/themes/tbwa/assets/images/arrow_white.svg" class="down-arrow" />
        </article>
        <!--/#pirates-quote-->
        <article id="pirates-video-container">
            <video id="pirates-video-player" class="video-js" height="300" width="300" controls preload="auto">
                <source src="<?php echo get_theme_mod('slider_video_pirate_url'); ?>" type="video/mp4">
            </video>
        </article>
        <!--/pirates-video-container-->
    </section>
    <!--/#pirated-intro-->
    <section id="pirates-container">
        <article id="pirates-leadership" class="grid-container bg-light">
            <article id="leadership-intro">
                <div class="row">
                    <div class="large-8 large-offset-5 medium-4 medium-offset-5 columns small-offset-1">
                        <h2 class="section-title">
                            <?php
                            echo get_term_meta(get_queried_object()->term_id, 'title_intro', true);
                            ?>
                        </h2>
                    </div>
                </div>
                <!--/.row-->
            </article>
            <?php
            $imgSize = [
                ['medium-4', 'medium-3 medium-offset-0 ', 'medium-2 medium-offset-0 ', 'medium-3 medium-offset-0'],
                ['medium-2', 'medium-3 medium-offset-0', 'medium-4 medium-offset-0', 'medium-3 medium-offset-0'],
                ['medium-3', 'medium-4 medium-offset-0', 'medium-3 medium-offset-0', 'medium-2 medium-offset-0']
            ];
            $rowCount = -1;
            $gridPos = -1;
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts_per_page = 12; // Số lượng bài post muốn hiển thị
            $args_total = array(
                'post_type' => 'post',
                'category_name' => 'pirates',
                'posts_per_page' => -1, // Lấy tất cả bài post trong category
            );
            $query_total = new WP_Query($args_total);
            $total_posts = $query_total->post_count; // Tổng số bài post trong category
            $total_pages = ceil($total_posts / $posts_per_page); // Tính tổng số trang
            wp_reset_postdata();

            // Lặp qua từng trang
            for ($page = 1; $page <= $total_pages; $page++) {
                echo '<div class="row">';
                // Tính toán offset cho trang hiện tại
                $offset = ($page - 1) * $posts_per_page;
                // Lặp qua mỗi hàng trong mảng imgSize
                for ($i = 0; $i < count($imgSize); $i++) {
                    $rowCount++;
                    $count_j = count($imgSize[$i]);
                    // Lặp qua từng phần tử trong hàng hiện tại
                    for ($j = 0; $j < count($imgSize[$i]); $j++) {
                        $gridPos++;
                        if ($gridPos % 4 == 0) {
                            $gridPos = 0;
                        }
                        $isLastIteration = ($j == $count_j - 1);
                        $classEnd = $isLastIteration ? 'end' : '';
                        // Lấy bài post tương ứng với chỉ số $i và $j
                        $args = array(
                            'post_type' => 'post',
                            'category_name' => 'pirates',
                            'posts_per_page' => 1, // Số lượng bài post muốn hiển thị
                            'paged' => $paged,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'offset' => $offset + $i * count($imgSize[$i]) + $j // Vị trí bắt đầu của bài post
                        );
                        $query = new WP_Query($args);
                        // Kiểm tra xem có bài post nào không
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $thumbnail_url = wp_get_attachment_url(get_post_meta(get_the_ID(), 'meta_box_section_thumbnail_field', true));
                                $post_content = strstr(get_the_content(), '#####', true);
                                // Hiển thị tiêu đề hoặc nội dung bài post ở đây
                                echo '<div class="columns small-12 small-offset-1 ' . $imgSize[$i][$j] . ' ' . $classEnd . '">';
                                echo '<div class="leader position-' . $rowCount . '-' . $gridPos . '">';
                                echo '<a href="' . get_permalink() . '">';
                                echo '<img class="leader-image" src="' . $thumbnail_url . '" />';
                                echo '</a>';
                                echo '<div class="leader-copy">';
                                echo '<a href="' . get_permalink() . '" class="name">' . get_the_title() . '</a>';
                                echo '<a href="' . get_permalink() . '" class="title">' . $post_content . '</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        wp_reset_postdata();
                        // Kiểm tra nếu đã hiển thị đủ số lượng bài post thì dừng vòng lặp
                        if (($offset + $i * count($imgSize[$i]) + $j + 1) >= $total_posts) {
                            break 3; // Thoát khỏi cả ba vòng lặp
                        }
                    }
                }
                echo '</div>';
            }
            ?>
        </article>
        <!--/#pirates-leadership-->
        <article id="pirates-news" class="bg-dark">
            <div class="row">
                <div class="large-8 columns  large-offset-5 small-offset-1">
                    <h2 class="section-title">In the News</h2>
                </div>
            </div>
            <!--/.row-->
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 8,
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
                    $childDiv = "<div class='work-entry'";
                    if ($post_count % 2 === 0) {
                        echo "<div class='row'>\n";
                    }
                    if ($post_count % 2 === 0) {
                        $div .= "'>\n";
                        $childDiv .= ">\n";
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

                    <a href="<?php echo $redirectUrl; ?>" alt="<?php the_title(); ?>"
					   <?php
						$newTab = get_post_meta(get_the_ID(), 'redirectUrl', true);
						if (!empty($newTab)) {
							echo "target='_blank'";
						}
						   ?>
					   >
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title(); ?>" />
                    </a>
                    <div>
                        <h3 class="entry-date"><?php echo get_post_meta(get_the_ID(), 'date', true); ?></h3>
                        <a class="entry-headline" href="<?php echo $redirectUrl; ?>" alt="<?php the_title(); ?>"
						   <?php
							 $newTab = get_post_meta(get_the_ID(), 'redirectUrl', true);
							 if (!empty($newTab)) {
								 echo "target='_blank'";
							 }
							 ?>
						   >
                            <?php the_title(); ?>
                            <?php
                            $test = get_post_meta(get_the_ID(), 'redirectUrl', true);
                            if (!empty($test)) {
                                echo "<img class='link-arrow' src='/wp-content/themes/tbwa/assets/images/link.svg' />";
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
            }
            ?>
            </div>

            <!--/.row-->
        </article>
        <!--/#pirates news -->
    </section>
    <?php get_template_part('footer-script'); ?>


    <?php get_footer(); ?>
    <?php
    wp_footer();
    ?>
</body>

</html>