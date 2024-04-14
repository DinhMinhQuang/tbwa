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
    <title>Document</title>
    <?php wp_head(); ?>
</head>

<body class="dark">
    <?php get_header(); ?>
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
            <img src="/wordpress/wp-content/themes/tbwa/assets/images/arrow_white.svg" class="down-arrow" />
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
                                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                $post_content = strip_tags(get_the_content());
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
            <div class="row">
                <div class="columns large-6 medium-10 small-14
            large-offset-1
            ">
                    <div class="work-entry ">
                        <a href="https://www.tbwa.com.vn/news/tbwaxtiktok-kể-chuyện-trong-thời-kỳ-sáng-tạo-phục-hưng-mới"
                            alt="TBWAxTiktok: STORYTELLING IN THE NEXT CREATIVE RENAISSANCE">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/TBWAxTiktok_2023-09-08-040106_glqo.png"
                                alt="TBWAxTiktok: STORYTELLING IN THE NEXT CREATIVE RENAISSANCE" />
                        </a>
                        <div>
                            <h3 class="entry-date">September 07, 2023</h3>
                            <a class="entry-headline"
                                href="https://www.tbwa.com.vn/news/tbwaxtiktok-kể-chuyện-trong-thời-kỳ-sáng-tạo-phục-hưng-mới"
                                alt="TBWAxTiktok: STORYTELLING IN THE NEXT CREATIVE RENAISSANCE">
                                TBWAxTiktok: STORYTELLING IN THE NEXT CREATIVE RENAISSANCE
                            </a>
                            <h4 class="entry-location">Vietnam</h4>
                            <p class="entry-body">
                                A brand&#039;s biggest creative efforts shouldn&#039;t be saved for key moments, but
                                allowed to flourish every day.
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
                <div class="columns large-5 medium-10 small-14
            large-offset-1
            medium-offset-4 end ">
                    <div class="work-entry  entry-middle ">
                        <a href="https://www.tbwa.com.vn/news/tbwa-was-named-adweeks-2022-global-agency"
                            alt="TBWA Recognized as Adweek&#039;s 2022 Global Agency of the Year for Second Year in a Row">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/la_ww_adweekaoy_twitter_post_02.png"
                                alt="TBWA Recognized as Adweek&#039;s 2022 Global Agency of the Year for Second Year in a Row" />
                        </a>
                        <div>
                            <h3 class="entry-date">December 14, 2022</h3>
                            <a class="entry-headline"
                                href="https://www.tbwa.com.vn/news/tbwa-was-named-adweeks-2022-global-agency"
                                alt="TBWA Recognized as Adweek&#039;s 2022 Global Agency of the Year for Second Year in a Row">
                                TBWA Recognized as Adweek&#039;s 2022 Global Agency of the Year for Second Year in a Row
                            </a>
                            <h4 class="entry-location">TBWA\Group Vietnam</h4>
                            <p class="entry-body">
                                The Disruption® Company received the accolade for its creative product, business growth,
                                innovation and for maximizing its potential across the globe
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
            </div>
            <!--/.row-->
            <div class="row">
                <div class="columns large-5 medium-10 small-14
            large-offset-1
            ">
                    <div class="work-entry ">
                        <a href="https://vietcetera.com/en/the-future-of-retail-in-vietnam?fbclid=IwAR1MWeVva7cMBL7iS--nJ65ZxtRkMlf0HPimgqQeKxxXWfMMpWPaJIioJj4"
                            alt="TBWA\ The Future Of Retail In Vietnam" target="_blank">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/resized-shutterstock-1509875111-min.jpg"
                                alt="TBWA\ The Future Of Retail In Vietnam" />
                        </a>
                        <div>
                            <h3 class="entry-date">July 08, 2021</h3>
                            <a class="entry-headline"
                                href="https://vietcetera.com/en/the-future-of-retail-in-vietnam?fbclid=IwAR1MWeVva7cMBL7iS--nJ65ZxtRkMlf0HPimgqQeKxxXWfMMpWPaJIioJj4"
                                alt="TBWA\ The Future Of Retail In Vietnam" target="_blank">
                                TBWA\ The Future Of Retail In Vietnam
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\Group Vietnam</h4>
                            <p class="entry-body">
                                Vietnam aims to have over half of the 96 million population shopping online by 2025 – a
                                trend only accelerated by the pandemic...
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
                <div class="columns large-6 medium-10 small-14
            large-offset-1
            medium-offset-4 end ">
                    <div class="work-entry  entry-middle ">
                        <a href="https://www.campaignasia.com/article/pride-month-how-can-brands-avoid-pinkwashing/469971?fbclid=IwAR2VddKECTk0k60WR6eaxNWoIdst4p_FGEjHzgEvFTXunUwBROQvU_blMXw"
                            alt="Pride month: How can brands avoid pinkwashing?" target="_blank">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/cdn.i.haymarketmedia.asia.jpeg"
                                alt="Pride month: How can brands avoid pinkwashing?" />
                        </a>
                        <div>
                            <h3 class="entry-date">June 02, 2021</h3>
                            <a class="entry-headline"
                                href="https://www.campaignasia.com/article/pride-month-how-can-brands-avoid-pinkwashing/469971?fbclid=IwAR2VddKECTk0k60WR6eaxNWoIdst4p_FGEjHzgEvFTXunUwBROQvU_blMXw"
                                alt="Pride month: How can brands avoid pinkwashing?" target="_blank">
                                Pride month: How can brands avoid pinkwashing?
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\GroupVietnam</h4>
                            <p class="entry-body">
                                To mark the beginning of Pride month, Hesperus Mak, the head of strategic planning at
                                TBWA Group Vietnam, shares his tips on how brands should approach the LGBT event.
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
            </div>
            <!--/.row-->
            <div class="row">
                <div class="columns large-6 medium-10 small-14
            large-offset-1
            ">
                    <div class="work-entry ">
                        <a href="https://advertisingvietnam.com/loreal-paris-ket-hop-cung-tbwagroup-vietnam-trong-chien-dich-chinh-nu-ton-vinh-mot-nua-the-gioi-nhan-ngay-83-p16232"
                            alt="L’Oreal Paris in association with TBWA \ Group Vietnam in the &quot;Chinh Nu - Because you’re worth it&quot; campaign - Honoring half of the world on March 8"
                            target="_blank">
                            <img src="https://www.tbwa.com.vn/assets/news/media.png"
                                alt="L’Oreal Paris in association with TBWA \ Group Vietnam in the &quot;Chinh Nu - Because you’re worth it&quot; campaign - Honoring half of the world on March 8" />
                        </a>
                        <div>
                            <h3 class="entry-date">March 09, 2021</h3>
                            <a class="entry-headline"
                                href="https://advertisingvietnam.com/loreal-paris-ket-hop-cung-tbwagroup-vietnam-trong-chien-dich-chinh-nu-ton-vinh-mot-nua-the-gioi-nhan-ngay-83-p16232"
                                alt="L’Oreal Paris in association with TBWA \ Group Vietnam in the &quot;Chinh Nu - Because you’re worth it&quot; campaign - Honoring half of the world on March 8"
                                target="_blank">
                                L’Oreal Paris in association with TBWA \ Group Vietnam in the &quot;Chinh Nu - Because
                                you’re worth it&quot; campaign - Honoring half of the world on March 8
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\ Group Vietnam</h4>
                            <p class="entry-body">
                                We have just shaken hands with beauty brand L&#039;Oreal Paris to give half of the world
                                a special gift on March 8th through the campaign &quot;Chinh Nu - Because you’re worth
                                it&quot;. Let&#039;s see!
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
                <div class="columns large-5 medium-10 small-14
            large-offset-1
            medium-offset-4 end ">
                    <div class="work-entry  entry-middle ">
                        <a href="https://advertisingvietnam.com/diem-danh-3-chien-dich-giup-tbwa-group-vietnam-rinh-vang-o-agency-of-the-year-2020-p15791?fbclid=IwAR3hKYRgo1baCXW47rjktPmLpQzV-vsyDs2JbztjtxF-o8joFBv3V8eE35Q"
                            alt="Attend three campaigns to help TBWA\ Group Vietnam &quot;get gold&quot; at Agency of the Year 2020"
                            target="_blank">
                            <img src="https://www.tbwa.com.vn/assets/news/AOY-Case-01.png"
                                alt="Attend three campaigns to help TBWA\ Group Vietnam &quot;get gold&quot; at Agency of the Year 2020" />
                        </a>
                        <div>
                            <h3 class="entry-date">December 15, 2020</h3>
                            <a class="entry-headline"
                                href="https://advertisingvietnam.com/diem-danh-3-chien-dich-giup-tbwa-group-vietnam-rinh-vang-o-agency-of-the-year-2020-p15791?fbclid=IwAR3hKYRgo1baCXW47rjktPmLpQzV-vsyDs2JbztjtxF-o8joFBv3V8eE35Q"
                                alt="Attend three campaigns to help TBWA\ Group Vietnam &quot;get gold&quot; at Agency of the Year 2020"
                                target="_blank">
                                Attend three campaigns to help TBWA\ Group Vietnam &quot;get gold&quot; at Agency of the
                                Year 2020
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\ Group Vietnam</h4>
                            <p class="entry-body">
                                With many shining campaigns in 2020, the TBWA\ Group Vietnam excellently won 2 Gold
                                Awards 🥇🥇 for themselves in Agency of The Year by Campaign Asia.
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
            </div>
            <!--/.row-->
            <div class="row">
                <div class="columns large-5 medium-10 small-14
            large-offset-1
            ">
                    <div class="work-entry ">
                        <a href="https://campaignbriefasia.com/2020/06/22/tbwagroup-vietnam-merges-fadigital-into-the-agency-collective/"
                            alt="TBWA Vietnam Joins Together with f\adigital" target="_blank">
                            <img src="https://www.tbwa.com.vn/assets/news/TBWA-Vietnam-Branding-in-Asia.jpg"
                                alt="TBWA Vietnam Joins Together with f\adigital" />
                        </a>
                        <div>
                            <h3 class="entry-date">June 22, 2020</h3>
                            <a class="entry-headline"
                                href="https://campaignbriefasia.com/2020/06/22/tbwagroup-vietnam-merges-fadigital-into-the-agency-collective/"
                                alt="TBWA Vietnam Joins Together with f\adigital" target="_blank">
                                TBWA Vietnam Joins Together with f\adigital
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location">TBWA\GroupVietnam</h4>
                            <p class="entry-body">
                                TBWA\ Group Vietnam has confirmed that f\adigital, previously known as Focus Asia, has
                                joined TBWA\Group Vietnam.
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
                <div class="columns large-6 medium-10 small-14
            large-offset-1
            medium-offset-4 end ">
                    <div class="work-entry  entry-middle ">
                        <a href="https://lbbonline.com/news/tbwavietnam-boosts-leadership-team-with-key-promotions/"
                            alt="TBWA\Vietnam Boosts Leadership Team with Key Promotions" target="_blank">
                            <img src="/wordpress/wp-content/themes/tbwa/assets/images/Ms-Tan-Nguyen.JPG"
                                alt="TBWA\Vietnam Boosts Leadership Team with Key Promotions" />
                        </a>
                        <div>
                            <h3 class="entry-date">December 06, 2016</h3>
                            <a class="entry-headline"
                                href="https://lbbonline.com/news/tbwavietnam-boosts-leadership-team-with-key-promotions/"
                                alt="TBWA\Vietnam Boosts Leadership Team with Key Promotions" target="_blank">
                                TBWA\Vietnam Boosts Leadership Team with Key Promotions
                                <img class="link-arrow"
                                    src="/wordpress/wp-content/themes/tbwa/assets/images/link.svg" />
                            </a>
                            <h4 class="entry-location"></h4>
                            <p class="entry-body">
                                TBWA\Group Vietnam has strengthened its senior management line-up with the promotion of
                                Tan Nguyen (Sunshine) to Managing Director and other senior changes.
                            </p>
                        </div>
                    </div>
                </div>
                <!--/.columns-->
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