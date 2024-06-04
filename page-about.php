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
	<?php 
        $attributes = get_language_attributes('html');
        preg_match('/lang="([^"]+)"/', $attributes, $matches);
        $lang_attribute_value = isset($matches[1]) ? $matches[1] : '';
        $lang_prefix = ($lang_attribute_value === 'vi_VN') ? '_vi' : '';
    ?>
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
					$content = get_the_content();
					$attachments = get_attached_media('image');

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
                <div class="large-1 large-offset-1 columns medium-14 medium-offset-0 small-14 small-offset-0">
                    <h3 class="section-title">Address</h3>
                </div>
                <div class="large-4 columns  medium-offset-0 medium-14 small-14 small-offset-0">
                    <span class="address">
                        <p><?php echo esc_html(get_theme_mod("extra_data_address_first_line{$lang_prefix}", '')) ?><br>
                        </p>
                        <p><?php echo esc_html(get_theme_mod("extra_data_address_second_line{$lang_prefix}", '')) ?><br></p>
                        <p><?php echo esc_html(get_theme_mod("extra_data_address_third_line{$lang_prefix}", '')) ?><br></p>
                        <p><?php echo esc_html(get_theme_mod("extra_data_address_fourth_line{$lang_prefix}", '')) ?><br></p>
                    </span>
                </div>
                <div class="large-1 columns medium-14 medium-offset-0 small-14 small-offset-0">
                    <h3 class="section-title">Telephone</h3>
                </div>
                <div class="large-3 columns medium-14 medium-offset-0 small-14 small-offset-0">
                    <a class="phone" href="tel:<?php echo esc_html(get_theme_mod('extra_data_phone', '')) ?>"><?php echo esc_html(get_theme_mod('extra_data_phone', '')) ?></a>
                </div>
                <div class="large-1 columns medium-14 medium-offset-0 small-14 small-offset-0">
                    <h3 class="section-title">Email</h3>
                </div>
                <div class="large-3 columns end medium-14 medium-offset-0 small-14 small-offset-0">
                    <a class="email" href="mailto:<?php echo esc_html(get_theme_mod('extra_data_email', '')) ?>"><?php echo esc_html(get_theme_mod('extra_data_email', '')) ?></a>
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
                    <h3 class="section-title" style="margin-top: -10px;"><?php echo wp_kses_post(get_post_meta(get_the_ID(), 'worldwide_about_title', true)); ?></h3>
                </div>
                <div class="columns large-4 small-6">
					<?php
					$featured_image_id = get_post_meta(get_the_ID(), 'worldwide_about_logo_id', true); // Lấy ID của hình ảnh nổi bật
					$featured_image_url = wp_get_attachment_image_url($featured_image_id, 'full'); // Lấy đường dẫn đến hình ảnh theo kích thước 'full'
					?>
                    <a href="<?php echo wp_kses_post(get_post_meta(get_the_ID(), 'worldwide_about_link', true)); ?>" target="_blank" id="global-logo">
                        <img src="<?php echo esc_url($featured_image_url); ?>" loading="lazy" alt="<?php echo wp_kses_post(get_post_meta(get_the_ID(), 'worldwide_about_title', true)); ?>" />
                    </a>
                </div>
                <div class="columns large-6 large-offset-1 end">
                    <div class="global-network-copy">
                        
						<?php
						$worldwide_about_content = get_post_meta($post->ID, 'worldwide_about_content', true);
						$worldwide_about_url = wp_kses_post(get_post_meta(get_the_ID(), 'worldwide_about_link', true));
						
						$parts = explode('#####', $worldwide_about_content);
						
						echo '<p>' . $parts[0] . '</p>';
						echo '<p><br/>' . $parts[1] . '<a href="'.$worldwide_about_url.'" target="_blank">'.$parts[2].'</a></p>';
						for ($i = 3; $i < count($parts); $i++) {
							echo '<p class="aligncenter"><br/>' . $parts[$i] . '</p>';// Hiển thị các phần tử còn lại
						}
					?>
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