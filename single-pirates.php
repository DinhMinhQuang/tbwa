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
    <title>Document</title>
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
                    
                    // Loại bỏ các thẻ <p> và </p> xung quanh văn bản
                    $textWithoutParagraphTags = strip_tags($textWithoutHashes, '<br>');

                    // Tách nội dung thành các đoạn bằng thẻ <br> hoặc <br /> sau đó loại bỏ dấu <br> ở cuối mỗi đoạn
                    $paragraphs = explode('<br />', $textWithoutParagraphTags);

                    foreach ($paragraphs as $paragraph) {
                        // Loại bỏ khoảng trắng và các ký tự trống khác ở đầu và cuối mỗi đoạn
                        $trimmedParagraph = trim($paragraph);
                        // Kiểm tra xem đoạn có rỗng không hoặc chỉ chứa ký tự khoảng trắng
                        if (!empty($trimmedParagraph)) {
                            // In ra đoạn văn bản nếu nó không chỉ chứa ký tự khoảng trắng
                            echo "<p>$trimmedParagraph</p><br />";
                        }
                    }
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