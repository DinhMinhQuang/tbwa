<?php /* Template Name: About */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title() ?> - <?php echo get_bloginfo('name'); ?></title>
    <link rel="shortcut icon" href="https://www.tbwa.com.vn/img/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
</head>

<body class="dark">
    <?php get_header(); ?>
    <?php get_template_part('cookie-notice'); ?>
    <section id="about-intro">
        <article id="about-splash">
            <div id="headlines">
                <h1>
                    <?php
                    $about__title = get_post_meta($post->ID, 'about__title', true);

                    if (!empty($about__title)) {
                        $parts = explode(' ##### ', $about__title);

                        foreach ($parts as $part) {
                            $part = trim($part);
                            if (!empty($part)) {
                                echo '<p>' . $part . '</p>';
                            }
                        }
                    } else {
                        echo '<p>' . get_the_title() . '</p>';
                    }
                    ?>
                </h1>
                <div class="slanted-button ">
                    <h4 id="about-video-watch">Watch</h4>
                </div>
            </div>
            <div id="backslash">\</div>
            <img src="/wp-content/themes/tbwa/assets/images/arrow_white.svg" class="down-arrow" />
        </article>
        <!--/#about-splash-->
        <article id="about-video-container">
            <video id="about-video-player" class="video-js" height="300" width="300" controls preload="auto">
                <source src="<?php echo get_theme_mod('slider_video_culture_url'); ?>" type="video/mp4">
            </video>
        </article>
        <!--/about-video-container-->
    </section>
    <!---/#about-intro-->
    <section id="about-landing" class="grid-container">
        <article id="about-intro" class="bg-light">
            <div class="row">
                <div class="columns large-6 large-offset-5 medium-11 medium-offset-1 small-offset-0 small-14">
                    <div class="slanted-container small-no-slant">
                        <h1><?php echo wp_kses_post(get_post_meta(get_the_ID(), 'company_about_title', true)); ?></h1>
                        <div class="slanted-block">
                            <?php echo wp_kses_post(get_post_meta(get_the_ID(), 'company_about_content', true)); ?>
                        </div>
                        <!--/.slanted-block-->
                    </div>
                    <!--/.slanted-container-->
                </div>
                <!--/.columns-->
            </div>
            <!--/.row-->
        </article>
        <article id="about-clients" class="bg-light">
            <div class="row">
                <div class="columns large-offset-2 large-10 end">
                    <h2><?php echo esc_html(get_post_meta(get_the_ID(), 'our_clients_title', true)); ?></h2>
                </div>
                <!--/.columns-->
            </div>
            <!--/.row-->
            <div class="row">
                <?php
                $post_id = get_the_ID();
                $content = get_post_field('post_content', $post_id);
                $attachments = get_attached_media('image', $post_id);

                // Đếm số lượng tệp đính kèm
                $attachment_count = count($attachments);

                // Khởi tạo biến đếm
                $count = 0;
                // Các class tương ứng với mỗi div
                $div_classes = array(
                    'large-2 medium-2 small-4 large-offset-1 medium-offset-1 small-offset-1',
                    'large-2 medium-2 small-4 medium-offset-0',
                    'large-2 medium-2 small-4 medium-offset-0',
                    'large-2 medium-2 small-4 medium-offset-0 small-offset-1',
                    'large-2 medium-2 small-4 medium-offset-0',
                    'large-2 medium-2 small-4 medium-offset-0 small-offset-0 end'
                );

                // Biến để theo dõi vị trí của mỗi div
                $div_position = 0;
                echo '<div class="row">';

                // Thêm mã để lấy hình ảnh từ nội dung
                preg_match_all('/<img[^>]+src=[\'"]([^\'"]+)[\'"][^>]*>/', $content, $matches);
                if (!empty($matches[1])) {
                    foreach ($matches[1] as $image_url) {
                        // Lấy class cho div hiện tại
                        $current_class = $div_classes[$div_position];

                        // In ra div với class tương ứng
                        echo '<div class="columns client ' . $current_class . '">';
                        echo '<img src="' . $image_url . '">';
                        echo '</div>';

                        // Tăng vị trí div lên một đơn vị, và nếu vượt quá số lượng class, quay trở lại vị trí đầu tiên
                        $div_position++;
                        if ($div_position >= count($div_classes)) {
                            echo '</div>';
                            echo '<div class="row">';
                            $div_position = 0;
                        }
                    }
                }

                if ($div_position != 0) {
                    echo '</div>';
                }
                ?>


            </div>
        </article>
        <!--/#about-clients-->
        <article id="about-address" class="bg-light">
            <div class="row">
                <div class="large-1 columns large-offset-1 medium-14 medium-offset-0 small-14 small-offset-0">
                    <h3 class="section-title">Address</h3>
                </div>
                <div class="large-3 columns  medium-offset-0 medium-14 small-14 small-offset-0">
                    <span class="address">
                        <p><?php echo esc_html(get_theme_mod('extra_data_address_first_line', '')) ?><br></p>
                        <p><?php echo esc_html(get_theme_mod('extra_data_address_second_line', '')) ?></p>
                        <p><?php echo esc_html(get_theme_mod('extra_data_address_third_line', '')) ?> </p>
                        <p> <?php echo esc_html(get_theme_mod('extra_data_address_fourth_line', '')) ?></p>
                    </span>
                </div>
                <div class="large-1 columns medium-14 medium-offset-0 small-14 small-offset-0">
                    <h3 class="section-title">Telephone</h3>
                </div>
                <div class="large-3 columns medium-14 medium-offset-0 small-14 small-offset-0">
                    <a class="phone"
                        href="tel:<?php echo esc_html(get_theme_mod('extra_data_phone', '')) ?>"><?php echo esc_html(get_theme_mod('extra_data_phone', '')) ?></a>
                </div>
                <div class="large-1 columns medium-14 medium-offset-0 small-14 small-offset-0">
                    <h3 class="section-title">Email</h3>
                </div>
                <div class="large-3 columns end medium-14 medium-offset-0 small-14 small-offset-0">
                    <a class="email"
                        href="mailto:<?php echo esc_html(get_theme_mod('extra_data_email', '')) ?>"><?php echo esc_html(get_theme_mod('extra_data_email', '')) ?></a>
                </div>
            </div>
            <!--/.row-->
        </article>
        <!--/#about-address-->
        <article id="about-global-network" class="bg-light">
            <div class="row">
                <div class="large-11 large-offset-2 columns end">
                    <div class="border-top"></div>
                </div>
            </div>
            <div class="row">
                <div class="large-1 columns large-offset-1 section-title-container">
                    <h3 class="section-title">Worldwide</h3>
                </div>
                <div class="columns large-4 small-6">
                    <a href="http://tbwa.com" target="_blank" id="global-logo">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 1729.27 305.76">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #fecc00;
                                    }
                                </style>
                            </defs>
                            <title>TBWA - TDC - Vertical Black</title>
                            <polygon
                                points="0 2.59 0 62.12 75.06 62.12 75.06 286.05 141.33 286.05 141.33 62.12 216.39 62.12 216.39 2.59 0 2.59" />
                            <polygon
                                points="770.01 2.59 722.1 176.66 721.3 176.66 678.18 2.59 607.91 2.59 564 176.66 563.2 176.66 515.29 2.59 444.22 2.59 532.86 286.05 593.94 286.05 643.45 99.61 643.85 99.61 691.36 286.05 752.44 286.05 841.07 2.59 770.01 2.59" />
                            <path
                                d="M1160.76,318.76h0.8l31.14,95.42H1130Zm-31.54-80.65-103.8,283.46h69.87l16.37-50.7h99.41l16.77,50.7h69.87L1193.1,238.11h-63.88Z"
                                transform="translate(-238.11 -235.52)" />
                            <polygon class="cls-1"
                                points="1026.42 2.59 1131.03 286.05 1190.55 286.05 1085.95 2.59 1026.42 2.59" />
                            <path
                                d="M623.72,433.34c0-17.57-13.17-29.94-41.92-29.94H543.47v59.89H581.8c24.75,0,41.92-10,41.92-29.94M543.47,351.1H575c20,0,35.93-9.18,35.93-27.15,0-16-11.58-27.15-38.33-27.15H543.47v54.3Zm149.72,91.43c0,45.51-29.94,79.05-90.63,79.05H478V238.11H585c63.08,0,93.42,25.55,93.42,69.07,0,24.35-10.38,49.9-41.12,62.68v0.8c38.33,10.38,55.9,36.73,55.9,71.86"
                                transform="translate(-238.11 -235.52)" />
                            <polygon
                                points="1281.49 15.13 1261.98 15.13 1261.98 2.59 1315.04 2.59 1315.04 15.13 1295.43 15.13 1295.43 73.26 1281.49 73.26 1281.49 15.13" />
                            <path
                                d="M1605.37,279.62v29.17h-13V282.9c0-9-3.29-11.85-9.46-11.85-7,0-11.45,4.38-11.45,13v24.69h-13V235.52h13v30.56h0.2a20.68,20.68,0,0,1,15.83-6.67c10.45,0,17.92,5.38,17.92,20.21"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1625.07,279.32h21.4c-1.29-5.08-4.78-8.46-10.45-8.46a10.75,10.75,0,0,0-10.95,8.46m34,9.36H1625a12.27,12.27,0,0,0,12.44,9.36,14.14,14.14,0,0,0,11.65-5.47l8.46,7.86c-4.18,5.27-11.25,9.16-21,9.16-14.23,0-25-10-25-25.18,0-14.73,10.25-25,24.09-25,14.23,0,23.79,10.35,23.79,24.59a20.72,20.72,0,0,1-.3,4.68"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1500.09,486.44c0-20.21,12.94-36.43,36-36.43a36.35,36.35,0,0,1,28.17,13.54L1554,472.3c-4.18-4.88-10.55-9-17.92-9-12.24,0-21.4,9-21.4,23.09,0,13.14,8.76,22.6,21.4,22.6a23.22,23.22,0,0,0,17.92-9l10.25,8.86a35.39,35.39,0,0,1-28.17,13.34c-19.31,0-36-12.54-36-35.83"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1606,497.29c0-8-5.37-13.44-12.64-13.44-7.57,0-12.64,5.77-12.64,13.44s5.28,13.44,12.64,13.44c7.07,0,12.64-5.57,12.64-13.44m-38.42,0c0-14.53,10.35-25.08,25.78-25.08,15.13,0,25.88,10.15,25.88,25.08s-10.75,25.08-25.88,25.08c-15.43,0-25.78-10.55-25.78-25.08"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1702.39,493.31v28.27h-13V496.49c0-7.76-2.39-12.64-8.46-12.64-5.47,0-10,4.68-10,13.44v24.29h-13V496.49c0-7.76-2.49-12.64-8.56-12.64-5.87,0-10.25,4.68-10.25,13.44v24.29h-13V473h13v6.47h0.1a18.42,18.42,0,0,1,14.53-7.27c6.37,0,11.45,2.39,14.43,7.76h0.2c4-5.08,10-7.76,16.92-7.76,10.55,0,17.12,6.27,17.12,21.1"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1749.14,497.49c0-8.36-5.48-13.64-12.44-13.64-7.47,0-12.64,5.87-12.64,13.64,0,8,5.57,13.24,12.64,13.24,7.37,0,12.44-5.38,12.44-13.24m13.24-.1c0,15-9.76,25-23.29,25-6.17,0-10.95-2.29-14.33-6.27h-0.2v25.18h-13V473h13v5.57h0.2a19,19,0,0,1,14.73-6.37c13,0,22.9,10.45,22.9,25.18"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1804.49,497.49c0-7.76-5.17-13.64-12.24-13.64s-12.54,5.28-12.54,13.64c0,7.86,5.18,13.24,12.44,13.24,6.77,0,12.34-5.28,12.34-13.24M1816.94,473v48.58h-12.34V515.7h-0.3c-3.28,4.28-8.26,6.67-14.53,6.67-13.44,0-23.19-10-23.19-25,0-14.73,9.86-25.18,22.89-25.18,5.77,0,10.75,2.09,14.24,6.27h0.3V473h12.94Z"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1872.65,492.71v28.87h-13V496c0-9.26-3.29-12.14-9.36-12.14-6.57,0-11,4.58-11,13.24v24.49h-13V473h13v6.27h0.2a20,20,0,0,1,15.53-7.07c10.45,0,17.72,5.58,17.72,20.51"
                                transform="translate(-238.11 -235.52)" />
                            <polygon
                                points="1672.71 237.48 1661.56 267.54 1661.46 267.54 1649.51 237.48 1635.98 237.48 1655.29 283.07 1646.73 305.76 1660.07 305.76 1686.25 237.48 1672.71 237.48" />
                            <path
                                d="M1522.89,402.74c13.74,0,22.8-9.85,22.8-22.8,0-13.24-9.16-22.9-21.9-22.9h-9.85v45.69h9Zm-22.8-58.23h23.39c22.4,0,36.73,14.53,36.73,35.44s-13.74,35.24-36.43,35.24h-23.69V344.5Z"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1568.39,366.6h13v48.58h-13V366.6Zm-1.49-14.83a8.11,8.11,0,1,1,8.06,8,8.07,8.07,0,0,1-8.06-8"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1587.25,408.91l6.37-9.06c4,3.78,8.16,5.68,13.44,5.68,3.78,0,6-1.59,6-4s-2.49-3.38-8.86-5.38c-8-2.69-14.93-6.47-14.93-15.83,0-8.76,7.56-14.54,17.52-14.54a27,27,0,0,1,17.72,6.07l-6.27,9.56a17.41,17.41,0,0,0-11.65-5.18c-2.09,0-4.78,1.1-4.78,3.68,0,2,2.59,3.38,7.37,5.18,10.55,3.88,16.72,6.17,16.72,15.73,0,8.66-6.17,15.13-18.91,15.13a29.5,29.5,0,0,1-19.71-7.07"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1661.26,365.91V380c-1.29-.1-2.69-0.1-3.38-0.1-8.06,0-12.44,5.48-12.44,12.64v22.6h-13V366.6h13v7.17h0.1a17.88,17.88,0,0,1,14.73-8,2.76,2.76,0,0,1,1,.1"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1712.72,366.6v48.58h-13v-6h-0.2a18.49,18.49,0,0,1-14.43,6.77c-10.45,0-17.82-5.28-17.82-20.11V366.6h12.94v25.78c0,9,2.69,11.94,8.76,11.94,5.67,0,10.75-4.78,10.75-14.13V366.6h13Z"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1759.58,391.09c0-8.36-5.47-13.64-12.44-13.64-7.47,0-12.64,5.87-12.64,13.64,0,8,5.57,13.24,12.64,13.24,7.37,0,12.44-5.37,12.44-13.24m13.24-.1c0,15-9.76,25-23.29,25-6.17,0-10.95-2.29-14.33-6.27H1735v25.18h-13V366.6h13v5.58h0.2a19,19,0,0,1,14.73-6.37c13,0,22.9,10.45,22.9,25.18"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1780.44,399.85v-22.5h-5.77V366.6h5.77V350.68l12.94-1.39V366.6h13.24v10.75h-13.24v20.71c0,4.18,1.29,6.17,4.28,6.17a15.24,15.24,0,0,0,6.17-1.69l3.39,10.45c-3.19,1.69-6.37,3-12.94,3-8.36,0-13.84-5.18-13.84-16.13"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1812.41,366.6h13v48.58h-13V366.6Zm-1.49-14.83a8.11,8.11,0,1,1,8.06,8,8.07,8.07,0,0,1-8.06-8"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1870.56,390.89c0-8-5.37-13.44-12.64-13.44-7.57,0-12.64,5.77-12.64,13.44s5.28,13.44,12.64,13.44c7.07,0,12.64-5.57,12.64-13.44m-38.42,0c0-14.53,10.35-25.08,25.78-25.08,15.13,0,25.88,10.15,25.88,25.08S1873,416,1857.92,416c-15.43,0-25.78-10.55-25.78-25.09"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1937.09,386.31v28.87h-13V389.6c0-9.26-3.28-12.14-9.36-12.14-6.57,0-11,4.58-11,13.24v24.49h-13V366.6h13v6.27h0.2a20,20,0,0,1,15.53-7.07c10.45,0,17.72,5.57,17.72,20.51"
                                transform="translate(-238.11 -235.52)" />
                            <path
                                d="M1950.26,359.2H1952c1.67,0,2.58-.81,2.58-2.05s-0.86-2-2.53-2h-1.77v4.1Zm5.06,2.62,3.63,5.53h-4.05l-3.19-5.06h-1.43v5.06h-3.48V352h6c3.77,0,5.44,2.24,5.44,5.25a4.55,4.55,0,0,1-2.91,4.63m8-2.05A11.11,11.11,0,1,0,1952.16,371a11.08,11.08,0,0,0,11.16-11.25m4.05,0a15.17,15.17,0,1,1-15.12-15.26,15.19,15.19,0,0,1,15.12,15.26"
                                transform="translate(-238.11 -235.52)" />
                        </svg>
                    </a>
                </div>
                <div class="columns large-6 large-offset-1 end">
                    <div class="global-network-copy">
                        <p>TBWA is a global collective, and has proven to be a catalyst in uniting over 11,300 people,
                            operating in 305 agencies, in 98 different countries.</p>
                        <p><br>For more information, go to <a href="http://tbwa.com" target="_blank">tbwa.com</a></p>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </article>
        <!--/#about-global-network-->
    </section>
    <!--/#about-landing-->
    <?php get_template_part('footer-script'); ?>
    <?php get_footer(); ?>
    <?php
    wp_footer();
    ?>
</body>

</html>