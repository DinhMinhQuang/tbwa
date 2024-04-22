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
                <img src="<?php
                echo esc_url(get_the_post_thumbnail_url($post->ID, 'full'));
                ?>" />
            </div>
            <div class="large-5 columns leadership-headline">
                <h1 class="name"><?php echo get_the_title($post->ID) ?></h1>
                <h2 class="title"><?php
                $before = strstr(get_the_content(), '#####', true); // Lấy phần trước dấu '#####'
                echo $before; // In ra "Your string here "
                ?></h2>
                <!--/.social-handles-->
            </div>
            <!--/.leadership-headline-->
            <div class="large-5 columns large-offset-0 end">
                <div class=" leadership-bio">
                    <?php
                    $text = strstr(get_the_content(), '#####'); // Lấy phần văn bản sau chuỗi '#####'
                    $textWithoutHashes = str_replace('#####', '', $text); // Loại bỏ các dấu '#####' khỏi văn bản
                    
                    // Tách nội dung thành các đoạn bằng thẻ <br> hoặc <br /> sau đó loại bỏ dấu <br> ở cuối mỗi đoạn
                    $paragraphs = explode('<br />', $textWithoutHashes);

                    foreach ($paragraphs as $paragraph) {
                        // Loại bỏ khoảng trắng và các ký tự trống khác ở đầu và cuối mỗi đoạn
                        $trimmedParagraph = trim($paragraph);
                        // Kiểm tra xem đoạn có rỗng không hoặc chỉ chứa ký tự khoảng trắng
                        if (!empty($trimmedParagraph)) {
                            // In ra đoạn văn bản nếu nó không chỉ chứa ký tự khoảng trắng
                            echo "<p>$trimmedParagraph</p>";
                        }
                    }
                    ?>



                    <!-- <p>Tan began her career in advertising as an Account Manager with Grey before moving to Pyramid
                        Consulting to capture the growing digital marketing landscape in Asia Pacific.</p>
                    <br />
                    <p>She joined TBWA\ in 2010 to lead the digital group in order to combine her digital experience
                        with her passion for advertising. <br /></p>
                    <br />
                    <p>With her promotion in 2017 to Managing Director, Tan’s responsibilities expanded to include the
                        leadership of Tequila, TBWA’s PR, Event, and Activation branch.<br /></p>
                    <br />
                    <p>In 2017, she was named Women to Watch, and TBWA won Silver Agency of The Year by Campaign Asia
                        under her leadership.</p>
                    <br />
                    <p>Outside of TBWA\, she runs around after her two little twins. <br /></p> -->
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