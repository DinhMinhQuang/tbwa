<?php
/**
 * Template Name: Single Work
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
    <?php
    $post_slug = get_post_field('post_name', get_post());
    $post = get_page_by_path($post_slug, OBJECT, 'post');
    ?>
    <section id="featured-media">
        <?php $featured_image_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
        <div class="vid-cover" style="background-image: url('<?php echo esc_url($featured_image_url); ?>');">
            <div class="image-darken" />
        </div>
        <div class="featured-media-overlay">
            <div class="client-date">
                <span class="client">
                    <?php echo get_post_meta($post->ID, 'client', true); ?>
                </span><span class="location"></span>
            </div>
            <div class="headline">
                <h1>
                    <?php
                    $title = get_the_title($post->ID);
                    $parts = explode(' ##### ', $title);

                    // Hiển thị các phần con với mỗi phần bọc trong thẻ <h1>
                    foreach ($parts as $part) {
                        // Loại bỏ các khoảng trắng ở đầu và cuối phần
                        $part = trim($part);
                        // Hiển thị thẻ <h1> cho mỗi phần nếu phần không rỗng
                        if (!empty($part)) {
                            echo '<h1>' . $part . '</h1>';
                        }
                    }
                    ?>
                </h1>
            </div>
            <!-- headline -->
            <a href="#" alt="<?php echo get_the_title($post->ID); ?>" class="slanted-button" id="watch-vid-work">
                <h4>Watch</h4>
            </a>
        </div>
        </div>
        <!--/.vid-cover-->
        <div class="vid-container">
            <div id="vid-wrapper">
                <iframe id="article-featured-video"
                    data-url="https://player.vimeo.com/video/<?php echo get_post_meta($post->ID, 'hero_vimeo_id', true); ?>?dnt=1&autoplay=0&api=1"
                    frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay"></iframe>
                <div id="frame-shield"></div>
            </div>
            <div class="vid-controls">
                <div class="vid-play">
                    <a href="#" id="vid-play-btn">play</a>
                </div>
                <!--/.vid-play-->
                <div class="vid-progress" id="vid-progress-bar">
                    <span class="meter"></span>
                    <span class="progress-dot"></span>
                </div>
                <!--/.vid-progress-->
                <div class="vid-fullscreen">
                    <a href="#" id="fullscreen">fullscreen video</a>
                </div>
                <!--/.vid-fullscreen-->
                <div class="vid-close">
                    <a href="#" id="vid-close">close video</a>
                </div>
                <!--/.vid-close-->
            </div>
            <!--/.vid-controls-->
        </div>
        <!--/.vid-container-->
    </section>
    <!--/#featured-media-->
    <div id="article-slash"></div>
    <!-- end slash -->
    <section id="article-content">
        <div class="grid-container">
            <div class="row">
                <div class="small-offset-2 xlarge-5 large-6 medium-8 small-11 columns">
                    <div id="main-copy">
                        <div class="blurb">
                            <?php echo trim(get_the_excerpt($post->ID)) ?>
                        </div>
                        <div class="article-copy">
                            <?php
                            // Lấy nội dung của bài viết
                            $content = get_the_content();

                            // Tìm vị trí của dấu '#####'
                            $end_position = strpos($content, '#####');

                            // Kiểm tra nếu dấu '#####' được tìm thấy
                            if ($end_position !== false) {
                                // Cắt chuỗi từ đầu đến vị trí của dấu '#####'
                                $excerpt = substr($content, 0, $end_position);

                                // Hiển thị nội dung đã cắt
                                echo $excerpt;
                            } else {
                                // Nếu không tìm thấy dấu '#####', hiển thị toàn bộ nội dung
                                echo $content;
                            }
                            ?>
                        </div>
                    </div>
                    <!--/.main-copy-->
                </div>
            </div>
            <div class="row" id="awards-share">
                <div class="large-1 large-offset-1 small-2 small-offset-2 columns article-share" style="display: none;">
                    <h2>Share</h2>
                </div>
                <div class="large-4 small-8 small-offset-1 medium-offset-0 columns end article-share"
                    style="display: none;">
                    <!-- 				<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
               --> <a href="https://twitter.com/intent/tweet?text=Viettel%20ST%20%22Feel%20Free%20For%20Data%2C%20Just%20%2215k%22%22%20by%20%40TBWA&url=https://www.tbwa.com.vn/work/tho%E1%BA%A3i-m%C3%A1i-data-ch%E1%BB%89-15k"
                        class="twitter-share">Share on Twitter</a>
                </div>
            </div>
            <div class="row">
                <!-- <div class=" ">
                    <div class="img-container ">
                        <img
                            src="/wordpress/wp-content/themes/tbwa/assets/images/Ảnh-chụp-Màn-hình-2020-09-08-lúc-12.20.55.png" />
                    </div>
                </div>
                <div class=" ">
                    <div class="img-container ">
                        <img
                            src="/wordpress/wp-content/themes/tbwa/assets/images/Ảnh-chụp-Màn-hình-2020-09-08-lúc-12.21.20.png" />
                    </div>
                </div> -->
                <div class=" ">
                    <?php
                    // Lấy nội dung của bài viết
                    $content = get_the_content();

                    // Tìm vị trí của dấu '#####'
                    $start_position = strpos($content, '#####');

                    // Kiểm tra nếu dấu '#####' được tìm thấy
                    if ($start_position !== false) {
                        // Cắt chuỗi từ vị trí của dấu '#####' đến cuối chuỗi
                        $excerpt = substr($content, $start_position + strlen('#####'));
                        // Hiển thị nội dung đã cắt và chỉnh sửa
                        echo apply_filters('the_content', $excerpt);
                    } else {
                        // Nếu không tìm thấy dấu '#####', hiển thị thông báo
                        echo "Marker not found in the content";
                    }
                    ?>
                </div>
            </div>
            <!--/.row -->
            <div class="row">
                <div class="columns large-14" id="back-to-parent">
                    <a href="https://www.tbwa.com.vn/work">More Work</a>
                </div>
            </div>
            <!--/.row -->
        </div>
        <!--/.grid-container-->
    </section>
    <?php get_template_part('footer-script'); ?>

    <?php get_footer(); ?>
    <?php
    wp_footer();
    ?>
</body>

</html>