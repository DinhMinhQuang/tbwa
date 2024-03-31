<?php
/*
Template Name: Home Disruption
*/
?>
<article id="home-disruption" class="bg-dark grid-container">
    <div class="row collapse">
        <div class="columns large-7 large-offset-3 medium-8 medium-offset-3 small-12 small-offset-1  end">
            <div class="slanted-container small-no-slant">
                <h2>
                    <?php $page = get_page_by_path('home-disruption');

                    // Kiểm tra xem trang có tồn tại không
                    if ($page) {
                        // Lấy nội dung của trang
                        echo get_post_field('post_title', $page->ID);
                    } ?>
                </h2>
                <div class="slanted-block">
                    <?php $page = get_page_by_path('home-disruption');

                    // Kiểm tra xem trang có tồn tại không
                    if ($page) {
                        // Lấy nội dung của trang
                        $content = get_post_field('post_content', $page->ID);

                        // Hiển thị nội dung trang
                        echo wp_strip_all_tags($content);
                    } ?>
                </div>
                <a href="<?php
                $page = get_page_by_path('home-disruption');
                if ($page) {
                    $redirect_url = get_post_meta($page->ID, 'redirectUrl', true);
                    if ($redirect_url) {
                        echo esc_url($redirect_url);
                    } else {
                        echo get_permalink($page->ID);
                    }
                } else {
                    echo '#'; // Default URL or handle error when page is not found
                }
                ?>">More on Disruption</a>
            </div>
        </div>
        <!--/.columns-->
    </div>
    <!--/.row-->
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'tag' => 'highlight_home'
    );

    $highlight_posts = new WP_Query($args);

    if ($highlight_posts->have_posts()):
        while ($highlight_posts->have_posts()):
            $highlight_posts->the_post();
            ?>
            <div class="work-item left-align disruption-work">
                <div class="row">
                    <!-- top image -->
                    <div class="large-6 small-8 columns">
                        <div class="bleed-left">
                            <a href="<?php the_permalink(); ?>" class="scale">
                                <?php
                                $second_featured_image_id = get_post_meta(get_the_ID(), 'second_featured_image', true);
                                if ($second_featured_image_id) {
                                    $second_featured_image_url = wp_get_attachment_image_src($second_featured_image_id, 'single_thumb');
                                    if ($second_featured_image_url) {
                                        ?>
                                        <img src="<?php echo $second_featured_image_url[0]; ?>">
                                        <?php
                                    }
                                }
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row work-copy-container">
                    <div class="row second-image">
                        <!-- bottom image -->
                        <div class="small-offset-1 small-10 large-7 columns">
                            <div class="darken-image">
                                <a href="<?php the_permalink(); ?>" class="scale">
                                    <img src="<?php echo get_the_post_thumbnail_url();
                                    ; ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row work-copy">
                        <!-- work copy -->
                        <div class="medium-offset-8 medium-6 small-offset-2 small-12 columns end">
                            <div class="slanted-container">
                                <a class="work-title" href="<?php the_permalink(); ?>">
                                    <h3>
                                        <?php the_title(); ?>
                                    </h3>
                                    <h4 class="client">
                                        <?php echo get_post_meta(get_the_ID(), 'client', true); ?>
                                        <h5 class="agency"></h5>
                                        <img src="/wordpress/wp-content/themes/tbwa/assets/images/arrow_white.svg"
                                            class="arrow">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata(); // Khôi phục lại dữ liệu bài viết
    else:
        // Không tìm thấy bài viết
        echo '<p>No posts found</p>';
    endif;
    ?>
    <div class="row" id="always-live">
        <div
            class="columns xlarge-5 xlarge-offset-7 medium-7 large-offset-4 medium-offset-3 small-12 small-offset-1 end">
            <div class="slanted-container small-no-slant">
                <h2>
                    <?php $page = get_page_by_path('home-bottom-disruption');

                    // Kiểm tra xem trang có tồn tại không
                    if ($page) {
                        // Lấy nội dung của trang
                        echo get_post_field('post_title', $page->ID);
                    } ?>
                </h2>
                <div class="slanted-block">
                    <?php $page = get_page_by_path('home-bottom-disruption');

                    // Kiểm tra xem trang có tồn tại không
                    if ($page) {
                        // Lấy nội dung của trang
                        echo wp_strip_all_tags(get_post_field('post_content', $page->ID));
                    } ?>
                </div>
                <a href="<?php
                $page = get_page_by_path('home-bottom-disruption');
                if ($page) {
                    $redirect_url = get_post_meta($page->ID, 'redirectUrl', true);
                    if ($redirect_url) {
                        echo esc_url($redirect_url);
                    } else {
                        echo get_permalink($page->ID);
                    }
                } else {
                    echo '#'; // Default URL or handle error when page is not found
                }
                ?>">
                    <?php
                    $page = get_page_by_path('home-bottom-disruption');
                    if ($page) {
                        echo get_post_meta($page->ID, 'text_link', true);
                    }
                    ?>
                </a>
            </div>
        </div>
        <!--/.columns-->
    </div>
    <!--/.row collapse-->
</article>