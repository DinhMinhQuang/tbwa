<?php
function theme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_supports');
function remove_home_page_settings($wp_customize)
{
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'remove_home_page_settings');


function tbwa_menus($locations = array())
{

    add_theme_support('menus');
}

add_action('init', 'tbwa_menus');

function custom_rewrite_rules()
{
    // Thêm rewrite rule mới
    add_rewrite_rule(
        '^work/page/([0-9]+)/?$',
        'index.php?category_name=work&paged=$matches[1]',
        'top'
    );
    add_rewrite_rule(
        '^news/page/([0-9]+)/?$',
        'index.php?category_name=news&paged=$matches[1]',
        'top'
    );
    add_rewrite_rule(
        '^pirates/page/([0-9]+)/?$',
        'index.php?category_name=pirates&paged=$matches[1]',
        'top'
    );
}

// Gọi hàm custom_rewrite_rules khi init
add_action('init', 'custom_rewrite_rules');

function hide_post_meta_boxes()
{
    remove_meta_box('trackbacksdiv', 'post', 'normal');
    remove_meta_box('commentsdiv', 'post', 'normal');
    remove_meta_box('postcustom', 'post', 'normal');
    remove_meta_box('commentstatusdiv', 'post', 'normal');

    remove_meta_box('trackbacksdiv', 'page', 'normal');
    remove_meta_box('commentsdiv', 'page', 'normal');
    remove_meta_box('postcustom', 'page', 'normal');
    remove_meta_box('commentstatusdiv', 'page', 'normal');

    remove_meta_box('postimagediv', 'page', 'side');
}
add_action('do_meta_boxes', 'hide_post_meta_boxes');

function tbwa_styles()
{
    wp_enqueue_style(
        'tbwa-video-js',
        get_template_directory_uri() . '/assets/css/video-js.css',
        array(),
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'videojs-playlist-ui.vertical',
        get_template_directory_uri() . '/assets/css/videojs-playlist-ui.vertical.css',
        array(),
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'tbwa-main-min',
        get_template_directory_uri() .
        '/assets/css/main.min.css',
        array(),
        'v1.0.1'
    );
}
add_action('wp_enqueue_scripts', 'tbwa_styles');

function tbwa_scripts()
{
    wp_enqueue_script(
        'jquery-min-js',
        get_template_directory_uri() . '/assets/js/jquery.min.js',
        array(),
        '1.0',
        true
    );
    wp_enqueue_script(
        'tweenMax.min.js',
        get_template_directory_uri() . '/assets/js/TweenMax.min.js',
        array(),
        '1.0',
        'all'
    );
    wp_enqueue_script(
        'scrollMagic',
        get_template_directory_uri() .
        '/assets/js/ScrollMagic.min.js',
        array(),
        '1.0',
        true
    );
    wp_enqueue_script(
        'animation-gsap-js',
        get_template_directory_uri() .
        '/assets/js/animation.gsap.js',
        array(),
        '1.0',
        true
    );

    wp_enqueue_script(
        'player-js',
        get_template_directory_uri() .
        '/assets/js/player.js',
        array(),
        '1.0',
        true
    );
    wp_enqueue_script(
        'video-min-js',
        get_template_directory_uri() .
        '/assets/js/videojs.min.js',
        array(),
        '1.0',
        true
    );
    if (is_front_page()) {
        wp_enqueue_script(
            'videomin-js',
            get_template_directory_uri() .
            '/assets/js/video.min.js',
            array(),
            '1.0',
            true
        );
    }
    wp_enqueue_script(
        'video-playlist-min-js',
        get_template_directory_uri() .
        '/assets/js/videojs-playlist.min.js',
        array(),
        '1.0',
        true
    );

    wp_enqueue_script(
        'video-playlist-ui-min',
        get_template_directory_uri() .
        '/assets/js/videojs-playlist-ui.min.js',
        array(),
        '1.0',
        true
    );

    wp_enqueue_script(
        'global-min',
        get_template_directory_uri() .
        '/assets/js/global.min.js',
        array(),
        '1.0',
        true
    );

    if (is_front_page()) {
        wp_enqueue_script(
            'homepage-min',
            get_template_directory_uri() .
            '/assets/js/homepage.min.js',
            array(),
            '1.0',
            true
        );
    }
    if (is_page('disruption')) {
        wp_enqueue_script(
            'disruption-min',
            get_template_directory_uri() .
            '/assets/js/disruption.min.js',
            array(),
            '1.0',
            true
        );
        wp_enqueue_script(
            'image-animated-sprite',
            get_template_directory_uri() .
            '/assets/js/image-animated-sprite.js',
            array(),
            '1.0',
            true
        );
    }
    if (is_page('about')) {
        wp_enqueue_script(
            'disruption-min',
            get_template_directory_uri() .
            '/assets/js/about.min.js',
            array(),
            '1.0',
            true
        );
    }
    if (is_category('work')) {
        wp_enqueue_script(
            'disruption-min',
            get_template_directory_uri() .
            '/assets/js/work.min.js',
            array(),
            '1.0',
            true
        );
    }
    if (is_category('pirates')) {
        wp_enqueue_script(
            'disruption-min',
            get_template_directory_uri() .
            '/assets/js/pirates.min.js',
            array(),
            '1.0',
            true
        );
    }
    if (is_single()) {
        wp_enqueue_script(
            'article-min',
            get_template_directory_uri() .
            '/assets/js/article.min.js',
            array(),
            '1.0',
            true
        );
        wp_enqueue_script(
            'article-video',
            get_template_directory_uri() .
            '/assets/js/article-video.min.js',
            array(),
            '1.0',
            true
        );
    }
}

add_action('wp_enqueue_scripts', 'tbwa_scripts');
function load_custom_wp_admin_style()
{
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

/**
 * Custom walker class.
 */
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // Start Element
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= '<span>'; // Add span here
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= '</span>'; // Close span
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}


function theme_customizer_settings($wp_customize)
{
    // White Logo
    $wp_customize->add_setting(
        'white_logo_setting',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'white_logo_control',
            array(
                'label' => __('White Logo', 'theme'),
                'section' => 'title_tagline', // Customize this section according to your needs
                'settings' => 'white_logo_setting',
            )
        )
    );

    // Black Logo
    $wp_customize->add_setting(
        'black_logo_setting',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'black_logo_control',
            array(
                'label' => __('Black Logo', 'theme'),
                'section' => 'title_tagline', // Customize this section according to your needs
                'settings' => 'black_logo_setting',
            )
        )
    );

    $wp_customize->add_setting(
        'footer_logo_setting',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'footer_logo_setting',
            array(
                'label' => __('Footer Logo', 'theme'),
                'section' => 'title_tagline', // Customize this section according to your needs
                'settings' => 'footer_logo_setting',
            )
        )
    );

    $wp_customize->remove_control('custom_logo');

    // Xóa phần tagline
    $wp_customize->remove_control('blogdescription');

}
add_action('customize_register', 'theme_customizer_settings');
function custom_single_template($single_template)
{
    global $post;

    if ($post->post_type == 'post' && has_category('work', $post)) {
        $single_template = locate_template(array('single-work.php'));
    }
    if ($post->post_type == 'post' && has_category('news', $post)) {
        $single_template = locate_template(array('single-news.php'));
    }

    if ($post->post_type == 'post' && has_category('pirates', $post)) {
        $single_template = locate_template(array('single-pirates.php'));
    }

    return $single_template;
}
add_filter('single_template', 'custom_single_template');

//Add meta box in the post or page
add_action('add_meta_boxes', 'custom_postpage_meta_box');
function custom_postpage_meta_box()
{

    $post_types = array('post');
    foreach ($post_types as $pt) {
        add_meta_box(
            'custom_postpage_meta_box_back',
            __('Back thumbnail on Homepage (for posts in page Work)', 'textdomain'),
            'custom_postpage_meta_box_func_1',
            $pt,
            'side',
            'low'
        );

        // Meta box 2
        add_meta_box(
            'custom_postpage_meta_box_front',
            __('Front thumbnail on Homepage (for posts in page Work)', 'textdomain'),
            'custom_postpage_meta_box_func_2',
            $pt,
            'side',
            'low'
        );

        // Section Post Thumbnail
        add_meta_box(
            'custom_postpage_meta_box_thumbnail',
            __('Post thumbnail', 'textdomain'),
            'custom_postpage_meta_box_func',
            $pt,
            'side',
            'low'
        );

    }
}

function custom_postpage_meta_box_func_1($post, )
{

    $meta_keys = array('meta_box_back_field');

    foreach ($meta_keys as $meta_key) {
        $image_meta_val = get_post_meta($post->ID, $meta_key, true);
        ?>
        <div class="custom_postpage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');"
                src="<?php echo ($image_meta_val != '' ? wp_get_attachment_image_src($image_meta_val)[0] : ''); ?>"
                style="width:100%;cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>" alt="">
            <a class="addimage" style="cursor:pointer;" onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');">
                <?php _e('Set Back thumbnail', 'textdomain'); ?>
            </a><br>
            <a class="removeimage" style="cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>"
                onclick="custom_postpage_remove_image('<?php echo $meta_key; ?>');">
                <?php _e('Remove Back thumbnail', 'textdomain'); ?>
            </a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>"
                value="<?php echo $image_meta_val; ?>">
        </div>
    <?php } ?>
    <script>
        function custom_postpage_add_image(key) {

            var $wrapper = jQuery('#' + key + '_wrapper');

            custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
                title: '<?php _e('select image', 'textdomain'); ?>',
                button: {
                    text: '<?php _e('select image', 'textdomain'); ?>'
                },
                multiple: false
            });
            custom_postimage_uploader.on('select', function () {

                var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
                var img_url = attachment['url'];
                var img_id = attachment['id'];
                $wrapper.find('input#' + key).val(img_id);
                $wrapper.find('img').attr('src', img_url);
                $wrapper.find('img').show();
                $wrapper.find('a.removeimage').show();
            });
            custom_postimage_uploader.on('open', function () {
                var selection = custom_postimage_uploader.state().get('selection');
                var selected = $wrapper.find('input#' + key).val();
                if (selected) {
                    selection.add(wp.media.attachment(selected));
                }
            });
            custom_postimage_uploader.open();
            return false;
        }

        function custom_postpage_remove_image(key) {
            var $wrapper = jQuery('#' + key + '_wrapper');
            $wrapper.find('input#' + key).val('');
            $wrapper.find('img').hide();
            $wrapper.find('a.removeimage').hide();
            return false;
        }
    </script>
    <?php wp_nonce_field('custom_postpage_meta_box', 'custom_postpage_meta_box_nonce');
}

function custom_postpage_meta_box_func_2($post)
{

    $meta_keys = array('meta_box_front_field');

    foreach ($meta_keys as $meta_key) {
        $image_meta_val = get_post_meta($post->ID, $meta_key, true);
        ?>
        <div class="custom_postpage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');"
                src="<?php echo ($image_meta_val != '' ? wp_get_attachment_image_src($image_meta_val)[0] : ''); ?>"
                style="width:100%;cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>" alt="">
            <a class="addimage" style="cursor:pointer;" onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');">
                <?php _e('Set Front thumbnail', 'textdomain'); ?>
            </a><br>
            <a class="removeimage" style="cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>"
                onclick="custom_postpage_remove_image('<?php echo $meta_key; ?>');">
                <?php _e('Remove Front thumbnail', 'textdomain'); ?>
            </a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>"
                value="<?php echo $image_meta_val; ?>">
        </div>
    <?php } ?>
    <script>
        function custom_postpage_add_image(key) {

            var $wrapper = jQuery('#' + key + '_wrapper');

            custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
                title: '<?php _e('select image', 'textdomain'); ?>',
                button: {
                    text: '<?php _e('select image', 'textdomain'); ?>'
                },
                multiple: false
            });
            custom_postimage_uploader.on('select', function () {

                var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
                var img_url = attachment['url'];
                var img_id = attachment['id'];
                $wrapper.find('input#' + key).val(img_id);
                $wrapper.find('img').attr('src', img_url);
                $wrapper.find('img').show();
                $wrapper.find('a.removeimage').show();
            });
            custom_postimage_uploader.on('open', function () {
                var selection = custom_postimage_uploader.state().get('selection');
                var selected = $wrapper.find('input#' + key).val();
                if (selected) {
                    selection.add(wp.media.attachment(selected));
                }
            });
            custom_postimage_uploader.open();
            return false;
        }

        function custom_postpage_remove_image(key) {
            var $wrapper = jQuery('#' + key + '_wrapper');
            $wrapper.find('input#' + key).val('');
            $wrapper.find('img').hide();
            $wrapper.find('a.removeimage').hide();
            return false;
        }
    </script>
    <?php wp_nonce_field('custom_postpage_meta_box', 'custom_postpage_meta_box_nonce');
}

function custom_postpage_meta_box_func($post)
{

    $meta_keys = array('meta_box_section_thumbnail_field');

    foreach ($meta_keys as $meta_key) {
        $image_meta_val = get_post_meta($post->ID, $meta_key, true);
        ?>
        <div class="custom_postpage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');"
                src="<?php echo ($image_meta_val != '' ? wp_get_attachment_image_src($image_meta_val)[0] : ''); ?>"
                style="width:100%;cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>" alt="">
            <a class="addimage" style="cursor:pointer;" onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');">
                <?php _e('Set Post thumbnail', 'textdomain'); ?>
            </a><br>
            <a class="removeimage" style="cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>"
                onclick="custom_postpage_remove_image('<?php echo $meta_key; ?>');">
                <?php _e('Remove Post thumbnail', 'textdomain'); ?>
            </a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>"
                value="<?php echo $image_meta_val; ?>">
        </div>
    <?php } ?>
    <script>
        function custom_postpage_add_image(key) {

            var $wrapper = jQuery('#' + key + '_wrapper');

            custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
                title: '<?php _e('select image', 'textdomain'); ?>',
                button: {
                    text: '<?php _e('select image', 'textdomain'); ?>'
                },
                multiple: false
            });
            custom_postimage_uploader.on('select', function () {

                var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
                var img_url = attachment['url'];
                var img_id = attachment['id'];
                $wrapper.find('input#' + key).val(img_id);
                $wrapper.find('img').attr('src', img_url);
                $wrapper.find('img').show();
                $wrapper.find('a.removeimage').show();
            });
            custom_postimage_uploader.on('open', function () {
                var selection = custom_postimage_uploader.state().get('selection');
                var selected = $wrapper.find('input#' + key).val();
                if (selected) {
                    selection.add(wp.media.attachment(selected));
                }
            });
            custom_postimage_uploader.open();
            return false;
        }

        function custom_postpage_remove_image(key) {
            var $wrapper = jQuery('#' + key + '_wrapper');
            $wrapper.find('input#' + key).val('');
            $wrapper.find('img').hide();
            $wrapper.find('a.removeimage').hide();
            return false;
        }
    </script>
    <?php wp_nonce_field('custom_postpage_meta_box', 'custom_postpage_meta_box_nonce');
}

add_action('save_post', 'custom_postimage_meta_box_save');
function custom_postimage_meta_box_save($post_id)
{

    if (!current_user_can('edit_post', $post_id)) {
        return 'You have no permission to edit this post';
    }

    if (isset($_POST['custom_postpage_meta_box_nonce']) && wp_verify_nonce($_POST['custom_postpage_meta_box_nonce'], 'custom_postpage_meta_box')) {
        $meta_keys = array('meta_box_back_field', 'meta_box_front_field', 'meta_box_section_thumbnail_field');
        foreach ($meta_keys as $meta_key) {
            if (isset($_POST[$meta_key]) && intval($_POST[$meta_key]) != '') {
                update_post_meta($post_id, $meta_key, intval($_POST[$meta_key]));
            } else {
                update_post_meta($post_id, $meta_key, '');
            }
        }
    }
}

function customizer_settings($wp_customize)
{
    // Thêm thiết lập cho đoạn văn bản trên trang chủ
    $wp_customize->add_setting(
        'homepage_text_line_1',
        array(
            'default' => 'We Are',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Hiển thị control cho đoạn văn bản trên trang chủ
    $wp_customize->add_control(
        'homepage_text_line_1',
        array(
            'label' => 'Text on Banner Line 1',
            'section' => 'title_tagline', // Chọn phần của Customizer để hiển thị control
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'homepage_text_line_2',
        array(
            'default' => 'The',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'homepage_text_line_2',
        array(
            'label' => 'Text on Banner Line 2',
            'section' => 'title_tagline', // Chọn phần của Customizer để hiển thị control
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'homepage_text_line_3',
        array(
            'default' => 'Disruption®',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    $wp_customize->add_control(
        'homepage_text_line_3',
        array(
            'label' => 'Text on Banner Line 3',
            'section' => 'title_tagline', // Chọn phần của Customizer để hiển thị control
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'homepage_text_line_4',
        array(
            'default' => 'Company',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'homepage_text_line_4',
        array(
            'label' => 'Text on Banner Line 4',
            'section' => 'title_tagline', // Chọn phần của Customizer để hiển thị control
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customizer_settings');
function customizer_settings_disruption($wp_customize)
{
    // Thêm section mới cho Content "Home Disruption"
    $wp_customize->add_section(
        'home_disruption_section',
        array(
            'title' => 'Disruption Section', // Title của section
            'priority' => 30,
        )
    );

    // Thêm thiết lập cho Content "Home Disruption"
    $wp_customize->add_setting(
        'home_disruption_first_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_first_title',
        array(
            'label' => 'First Title',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'home_disruption_first_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_first_content',
        array(
            'label' => 'First Content',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );


    $wp_customize->add_setting(
        'home_disruption_first_link',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_first_link',
        array(
            'label' => 'First Button Name',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );


    $wp_customize->add_setting(
        'home_disruption_second_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_second_title',
        array(
            'label' => 'Second Title',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'home_disruption_second_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_second_content',
        array(
            'label' => 'Second Content',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );

    // Control cho content thứ 2 
    $wp_customize->add_setting(
        'home_disruption_second_link',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_second_link',
        array(
            'label' => 'Second Button Name',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customizer_settings_disruption');

function customizer_settings_pirates($wp_customize)
{
    // Thêm section mới cho Content "Home Disruption"
    $wp_customize->add_section(
        'home_pirates_section',
        array(
            'title' => 'Pirates Section', // Title của section
            'priority' => 32,
        )
    );

    // Thêm thiết lập cho Content "Home Disruption"
    $wp_customize->add_setting(
        'home_pirates_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_pirates_section'
    $wp_customize->add_control(
        'home_pirates_title',
        array(
            'label' => 'Title',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'home_pirates_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'home_pirates_content',
        array(
            'label' => 'Content',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'text',
        )
    );


    $wp_customize->add_setting(
        'home_pirates_link',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_pirates_link',
        array(
            'label' => 'Button Name',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'text',
        )
    );

    // Black Logo
    $wp_customize->add_setting(
        'home_pirates_banner',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'home_pirates_banner_control',
            array(
                'label' => __('Pirates Banner', 'theme'),
                'section' => 'home_pirates_section', // Customize this section according to your needs
                'settings' => 'home_pirates_banner',
            )
        )
    );
}
add_action('customize_register', 'customizer_settings_pirates');

function customizer_settings_work($wp_customize)
{
    $wp_customize->add_section(
        'home_work_section',
        array(
            'title' => 'Work Section', // Title của section
            'priority' => 31,
        )
    );

    // Thêm thiết lập cho Content "Home Disruption"
    $wp_customize->add_setting(
        'home_work_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_pirates_section'
    $wp_customize->add_control(
        'home_work_title',
        array(
            'label' => 'Title',
            'section' => 'home_work_section', // Chọn section mới
            'type' => 'text',
        )
    );

    // Thêm thiết lập cho Content "Home Disruption"
    $wp_customize->add_setting(
        'home_work_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_pirates_section'
    $wp_customize->add_control(
        'home_work_content',
        array(
            'label' => 'Content',
            'section' => 'home_work_section', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'home_work_link_name',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_pirates_section'
    $wp_customize->add_control(
        'home_work_link_name',
        array(
            'label' => 'Button Name',
            'section' => 'home_work_section', // Chọn section mới
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customizer_settings_work');

function custom_extra_information($wp_customize)
{
    // Thêm Section cho Footer
    $wp_customize->add_section(
        'extra_data',
        array(
            'title' => __('Contact & Address', 'textdomain'),
            'priority' => 200,
        )
    );

    // Thêm Setting cho Content footer
    $wp_customize->add_setting(
        'business_inquiries_first_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_first_title',
        array(
            'label' => __('Business Inquiries First Title', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    // Thêm Setting cho Content footer
    $wp_customize->add_setting(
        'business_inquiries_first_name',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_first_name',
        array(
            'label' => __('Business Inquiries First Name', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'business_inquiries_first_email',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_first_email',
        array(
            'label' => __('Business Inquiries First Email', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'business_inquiries_second_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_second_title',
        array(
            'label' => __('Business Inquiries Second Title', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    // Thêm Setting cho Content footer
    $wp_customize->add_setting(
        'business_inquiries_second_name',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_second_name',
        array(
            'label' => __('Business Inquiries Second Name', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'business_inquiries_second_email',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_second_email',
        array(
            'label' => __('Business Inquiries Second Email', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_name',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_name',
        array(
            'label' => __('Company Name', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_address_first_line',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'extra_data_address_first_line',
        array(
            'label' => 'Address First Line',
            'section' => 'extra_data', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'extra_data_address_second_line',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'extra_data_address_second_line',
        array(
            'label' => 'Address Second Line',
            'section' => 'extra_data', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'extra_data_address_third_line',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'extra_data_address_third_line',
        array(
            'label' => 'Address Third Line',
            'section' => 'extra_data', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'extra_data_address_fourth_line',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'extra_data_address_fourth_line',
        array(
            'label' => 'Address Fourth Line',
            'section' => 'extra_data', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_phone',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_phone',
        array(
            'label' => __('TBWA Phone Number', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_email',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_email',
        array(
            'label' => __('TBWA Email', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_facebook',
        array(
            'label' => __('Facebook Url', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_linkedin',
        array(
            'label' => __('LinkedIn Url', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_instagram',
        array(
            'label' => __('Instagram Url', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'custom_extra_information');

function home_slider_customize($wp_customize)
{
    $wp_customize->add_section(
        'slider_video_section',
        array(
            'title' => __('Banner Videos', 'theme'),
            'capability' => 'edit_theme_options'
        )
    );

    $wp_customize->add_setting(
        'banner_video',
        array(
            'default' => '',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'banner_video_control',
            array(
                'label' => __('Banner Video', 'theme'),
                'section' => 'slider_video_section',
                'type' => 'media',
                'settings' => 'banner_video',
            )
        )
    );

    $wp_customize->add_setting(
        'slider_video_culture_url',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_culture_url',
        array(
            'label' => 'Video Url - Our Culture',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_culture_button',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_culture_button',
        array(
            'label' => 'Button name - Our Culture',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_disruption_url',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_disruption_url',
        array(
            'label' => 'Video Url - Disruption',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_disruption_button',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_disruption_button',
        array(
            'label' => 'Button name - Disruption',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_software_url',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_software_url',
        array(
            'label' => 'Video Url - Our Software',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_software_button',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_software_button',
        array(
            'label' => 'Button name - Our Software',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_work_url',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_work_url',
        array(
            'label' => 'Video Url - Our Work',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_work_button',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_work_button',
        array(
            'label' => 'Button name - Our Work',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_pirate_url',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_pirate_url',
        array(
            'label' => 'Video Url - Pirates',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_pirate_button',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_pirate_button',
        array(
            'label' => 'Button name - Pirates',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

}
add_action('customize_register', 'home_slider_customize');

/* START PAGE DISRUPTION */
function add_custom_meta_boxes()
{
    global $post;
    if (!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if ($pageTemplate == 'page-disruption.php') {
            add_meta_box('featured_image_meta_box', 'Banner, Title, Text and Video Disruption', 'render_featured_image_meta_box', 'page', 'side', 'default');
            add_meta_box('methods_meta_box', 'Module Methods Disruption', 'render_content_methods_meta_box', 'page', 'side', 'default');
            add_meta_box('about_meta_box', 'Module About Disruption', 'render_content_about_meta_box', 'page', 'side', 'default');
        }
    }
}
add_action('add_meta_boxes', 'add_custom_meta_boxes');
/*Banner , Title , Text and Video */
function render_featured_image_meta_box($post)
{

    $featured_image_id = get_post_meta($post->ID, 'featured_image_id', true);
    $featured_image = wp_get_attachment_image_src($featured_image_id, 'medium');
    $custom_title_disruption = get_post_meta($post->ID, 'custom_title_disruption', true);
    $custom_text = get_post_meta($post->ID, 'custom_text', true);
    ?>
    <p>
        <label for="custom_title_disruption">
            <?php _e('Custom Title'); ?>
        </label><br />
        <input style="width: 100%;" name="custom_title_disruption" id="custom_title_disruption"
            value="<?php echo esc_attr($custom_title_disruption); ?>" />
    </p>
    <p>
        <label for="featured_image">
            <?php _e('Upload Featured Image'); ?>
        </label><br />
        <input type="hidden" name="featured_image_id" id="featured_image_id" value="<?php echo $featured_image_id; ?>" />
        <img id="featured_image" src="<?php echo $featured_image ? $featured_image[0] : ''; ?>" style="max-width: 100%;" />
        <button type="button" id="featured_image_button" class="button-secondary">
            <?php _e('Select Image'); ?>
        </button>
        <button type="button" id="featured_image_remove_button" class="button-secondary">
            <?php _e('Remove Image'); ?>
        </button>
    </p>
    <p>
        <label for="custom_text">
            <?php _e('Custom Text'); ?>
        </label><br />
        <textarea style="width: 100%;" name="custom_text" id="custom_text" rows="5"
            cols="50"><?php echo $custom_text; ?></textarea>
    </p>
    <p><b>The video will be taken from the settings on the home page in the "Home Slider => Slider Video Disruption Url"
            section.</b></p>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#featured_image_button').click(function () {
                var frame = wp.media({
                    title: 'Select or Upload Image',
                    multiple: false,
                    library: {
                        type: 'image'
                    },
                    button: {
                        text: 'Select'
                    }
                });

                frame.on('select', function () {
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#featured_image').attr('src', attachment.url);
                    $('#featured_image_id').val(attachment.id);
                });

                frame.open();
            });

            $('#featured_image_remove_button').click(function () {
                $('#featured_image').attr('src', '');
                $('#featured_image_id').val('');
            });
        });
    </script>
    <?php
}
/* Module Methods */
function render_content_methods_meta_box($post)
{
    $methods_title = get_post_meta($post->ID, 'methods_title', true);
    $methods_content = get_post_meta($post->ID, 'methods_content', true);
    $methods_video = get_post_meta($post->ID, 'methods_video', true);

    ?>
    <div><b>Content</b></div>
    <p>
        <label for="methods_content">
            Content Methods
        </label><br />
        <input style="width: 100%;" name="methods_content" id="methods_content"
            value="<?php echo esc_attr($methods_content); ?>" />
    </p>
    <div><b>Video</b></div>
    <p>
        <label for="methods_video">
            Video Methods (Video upload under 40MB)
        </label><br />
        <input style="width: 100%;" name="methods_video" id="methods_video"
            value="<?php echo esc_attr($methods_video); ?>" />
    </p>
    <?php
}
/* Module About */
function render_content_about_meta_box($post)
{
    $module_methods_id = get_post_meta($post->ID, 'about_meta_box', true);
    $title_about_video_disruption = get_post_meta($post->ID, 'title_about_video_disruption', true);
    $text_about_video_disruption = get_post_meta($post->ID, 'text_about_video_disruption', true);
    $about_video_disruption = get_post_meta($post->ID, 'about_video_disruption', true);
    ?>
    <div><b>Text and Video 1</b></div>
    <p>
        <label for="title_about_video_disruption">Title</label>
        <br><input style="width: 100%" type="text" name="title_about_video_disruption" id="title_about_video_disruption"
            value="<?php echo $title_about_video_disruption; ?>"></br>
    </p>
    <p>
        <label for="text_about_video_disruption">Text</label>
        <br><input style="width: 100%" type="text" name="text_about_video_disruption" id="text_about_video_disruption"
            value="<?php echo $text_about_video_disruption; ?>"></br>
    </p>
    <p>
        <label for="about_video_disruption">Video Methods (Video upload under 40MB)</label>
        <br><input style="width: 100%" type="text" name="about_video_disruption" id="about_video_disruption"
            value="<?php echo $about_video_disruption; ?>"></br>
    </p>
    <?php
    for ($i = 1; $i <= 4; $i++) {
        $featured_image_about_id = get_post_meta($post->ID, 'featured_image_about_id_' . $i, true);
        $featured_image_about = wp_get_attachment_image_src($featured_image_about_id, 'medium');
        $title_about_disruption = get_post_meta($post->ID, 'title_about_disruption' . $i, true);
        $text_about_disruption = get_post_meta($post->ID, 'text_about_disruption' . $i, true);
        ?>
        <div><b><?php printf(__('Text and Image %d'), $i); ?></b></div>
        <p>
            <label for="title_about_disruption<?php echo $i; ?>">Title</label>
            <br><input style="width: 100%" type="text" name="title_about_disruption<?php echo $i; ?>"
                id="title_about_disruption<?php echo $i; ?>" value="<?php echo $title_about_disruption; ?>"></br>
        </p>
        <p>
            <label for="text_about_disruption<?php echo $i; ?>">Text</label>
            <br><input style="width: 100%" type="text" name="text_about_disruption<?php echo $i; ?>"
                id="text_about_disruption<?php echo $i; ?>" value="<?php echo $text_about_disruption; ?>"></br>
        </p>
        <p>
            <label for="featured_image_about_<?php echo $i; ?>">
                Upload Image
            </label><br />
            <input type="hidden" name="featured_image_about_id_<?php echo $i; ?>" id="featured_image_about_<?php echo $i; ?>_id"
                value="<?php echo $featured_image_about_id; ?>" />
            <img id="featured_image_about_<?php echo $i; ?>"
                src="<?php echo $featured_image_about ? $featured_image_about[0] : ''; ?>" style="max-width: 100%;" />
            <button type="button" class="button-secondary featured_image_about_button"
                data-target="featured_image_about_<?php echo $i; ?>">
                <?php _e('Select Image'); ?>
            </button>
            <button type="button" class="button-secondary featured_image_about_remove_button"
                data-target="featured_image_about_<?php echo $i; ?>">
                <?php _e('Remove Image'); ?>
            </button>
        </p>
        <?php
    }
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.featured_image_about_button').click(function () {
                var target = $(this).data('target');
                var frame = wp.media({
                    title: 'Select or Upload Image',
                    multiple: false,
                    library: {
                        type: 'image'
                    },
                    button: {
                        text: 'Select'
                    }
                });

                frame.on('select', function () {
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#' + target).attr('src', attachment.url);
                    $('#' + target + '_id').val(attachment.id);
                });

                frame.open();
            });

            $('.featured_image_about_remove_button').click(function () {
                var target = $(this).data('target');
                $('#' + target).attr('src', '');
                $('#' + target + '_id').val('');
            });
        });
    </script>
    <?php
}
/* END PAGE DISRUPTION */
/* START PAGE ABOUT */
function add_custom_page_about_meta_boxes()
{
    global $post;
    if (!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if ($pageTemplate == 'page-about.php') {
            add_meta_box('featured_image_about_meta_box', 'Title and Video About', 'render_page_about_img_featured_meta_box', 'page', 'side', 'default');
            add_meta_box('company_about_meta_box', 'Module Company About', 'render_content_company_about_meta_box', 'page', 'side', 'default');
            add_meta_box('our_clients_meta_box', 'Module Our Clients', 'render_content_our_clients_meta_box', 'page', 'side', 'default');
        }
    }
}
add_action('add_meta_boxes', 'add_custom_page_about_meta_boxes');
function render_page_about_img_featured_meta_box($post)
{
    /* Title and Video About */
    $featured_image_id = get_post_meta($post->ID, 'featured_image_bout_id', true);
    $about__title = get_post_meta($post->ID, 'about__title', true);
    ?>
    <p>
        <label for="about__title">
            Title (Use '#####' to drop rows from header)
        </label><br />
        <input style="width: 100%;" name="about__title" id="about__title" value="<?php echo esc_attr($about__title); ?>" />
    </p>
    <p><b>The video will be taken from the settings on the home page in the "Home Slider => Slider Video About Url"
            section.</b></p>
    <?php
}
/* Module Company */
function render_content_company_about_meta_box($post)
{
    $module_methods_id = get_post_meta($post->ID, 'company_about_meta_box', true);
    $company_about_title = get_post_meta($post->ID, 'company_about_title', true);
    $company_about_content = get_post_meta($post->ID, 'company_about_content', true);
    ?>
    <div><b>Title</b></div>
    <p>
        <label for="company_about_title">
            Title Company
        </label><br />
        <input type="text" style="width: 100%;" name="company_about_title" id="company_about_title"
            value="<?php echo wp_kses_post($company_about_title); ?>" />
    </p>
    <div><b>Content</b></div>
    <p>
        <label for="company_about_content">
            Content Company
        </label><br />
        <textarea style="width: 100%;" name="company_about_content" id="company_about_content" rows="5"
            cols="50"><?php echo esc_html($company_about_content); ?></textarea>
    </p>
    <?php
}
function render_content_our_clients_meta_box($post)
{
    $our_clients_title = get_post_meta($post->ID, 'our_clients_title', true);
    ?>
    <div><b>Title</b></div>
    <p>
        <label for="our_clients_title">
            Title Our Clients
        </label><br />
        <input type="text" style="width: 100%;" name="our_clients_title" id="our_clients_title"
            value="<?php echo htmlspecialchars($our_clients_title); ?>" />
    </p>
    <div><b>Image Our Clients</b></div>
    <p><b>"The images will be taken from the content entry on the pages"</b></p>
    <?php
}
/* END PAGE ABOUT */
/* Save Disruption & About */
function save_disruption_meta_box($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    // Các trường meta có cùng cấu trúc
    $meta_fields = array(
        //Disruption
        'featured_image_id',
        'custom_title_disruption',
        'custom_text',
        'anchor_links1',
        'anchor_links2',
        'anchor_links3',
        'methods_title',
        'methods_content',
        'methods_video',
        'text_about_disruption1',
        'text_about_disruption2',
        'text_about_disruption3',
        'text_about_disruption4',
        'title_about_disruption1',
        'title_about_disruption2',
        'title_about_disruption3',
        'title_about_disruption4',
        'featured_image_about_id_1',
        'featured_image_about_id_2',
        'featured_image_about_id_3',
        'featured_image_about_id_4',
        'title_about_video_disruption',
        'text_about_video_disruption',
        'about_video_disruption',
        //About
        'about__title',
        'company_about_title',
        'company_about_content',
        'our_clients_title'
    );

    // Lặp qua mảng các trường meta để lưu giá trị
    foreach ($meta_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, wp_kses_post($_POST[$field]));
        }
    }
}
add_action('save_post', 'save_disruption_meta_box');

// Hàm sẽ được gọi khi trang chỉnh sửa danh mục được tạo ra
function custom_category_fields($term)
{
    // Lấy giá trị hiện tại của các trường nếu có
    $field1_value = get_term_meta($term->term_id, 'banner_title', true);
    $field2_value = get_term_meta($term->term_id, 'title_intro', true);
    $field3_value = get_term_meta($term->term_id, 'description_intro', true);
    $image_url = get_term_meta($term->term_id, 'banner_image', true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="banner_title">Banner Title</label></th>
        <td>
            <input type="text" name="banner_title" id="banner_title" value="<?php echo esc_attr($field1_value); ?>" />
            <p class="description">Banner Title.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="title_intro">Title Intro</label></th>
        <td>
            <input type="text" name="title_intro" id="title_intro" value="<?php echo esc_attr($field2_value); ?>" />
            <p class="description">Enter title intro for work list.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="description_intro">Description Intro</label></th>
        <td>
            <textarea name="description_intro" id="description_intro"
                rows="5"><?php echo esc_textarea($field3_value); ?></textarea>
            <p class="description">Enter description intro for work list.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="banner_image">Category Image</label></th>
        <td>
            <input type="text" name="banner_image" id="banner_image" value="<?php echo esc_attr($image_url); ?>" readonly />
            <button type="button" class="button button-secondary" id="upload_image_button">Upload Image</button>
            <p class="description">Upload or select an image for this category.</p>
            <script>
                jQuery(document).ready(function ($) {
                    $('#upload_image_button').click(function () {
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        wp.media.editor.send.attachment = function (props, attachment) {
                            $('#banner_image').val(attachment.url);
                            wp.media.editor.send.attachment = send_attachment_bkp;
                        }
                        wp.media.editor.open();
                        return false;
                    });
                });
            </script>
        </td>
    </tr>
    <?php
}
add_action('edit_category_form_fields', 'custom_category_fields');

// Hàm sẽ được gọi khi bạn lưu danh mục
function save_custom_category_fields($term_id)
{
    if (isset($_POST['banner_title'])) {
        // Lưu giá trị của trường 1
        update_term_meta($term_id, 'banner_title', wp_kses_post($_POST['banner_title']));
    }
    if (isset($_POST['title_intro'])) {
        // Lưu giá trị của trường 2
        update_term_meta($term_id, 'title_intro', sanitize_text_field($_POST['title_intro']));
    }
    if (isset($_POST['description_intro'])) {
        // Lưu giá trị của trường 3
        update_term_meta($term_id, 'description_intro', wp_kses_post($_POST['description_intro']));
    }
    if (isset($_POST['banner_image'])) {
        // Lưu URL của ảnh
        update_term_meta($term_id, 'banner_image', esc_url_raw($_POST['banner_image']));
    }
}
add_action('edited_category', 'save_custom_category_fields');
/* Classic Editor Pages Posts */
add_filter('use_block_editor_for_post', '__return_false');

function custom_excerpt_label($translated_text, $text, $domain)
{
    // Kiểm tra xem đang ở trang chỉnh sửa bài viết và text đang được dịch có phải là "Excerpt" không
    if (is_admin() && $text === 'Excerpt') {
        // Thay đổi label thành chuỗi mới bạn muốn
        $translated_text = 'Excerpt (secondary post title)';
    }
    return $translated_text;
}
add_filter('gettext', 'custom_excerpt_label', 20, 3);

function custom_admin_featured_image_label()
{
    global $post_type;

    // Chỉ thực hiện đối với post type là post
    if ($post_type === 'post') {
        // Thay đổi label của trường Feature Image
        remove_meta_box('postimagediv', 'post', 'side');
        add_meta_box('postimagediv', __('Banner image (for posts in page Work)'), 'post_thumbnail_meta_box', 'post', 'side', 'default');
    }
}
add_action('do_meta_boxes', 'custom_admin_featured_image_label');

function add_custom_meta_boxes_based_on_category($post_type, $post)
{
    if ($post_type === 'post') {
        add_meta_box('custom_meta_box_for_word_category', 'Apply for page Work', 'render_custom_meta_box_for_word_category', $post_type, 'normal', 'default', $post);
        add_meta_box('custom_meta_box_for_news_category', 'Apply for page News', 'render_custom_meta_box_for_news_category', $post_type, 'normal', 'default', $post);
    }
}
add_action('add_meta_boxes', 'add_custom_meta_boxes_based_on_category', 10, 2);


function render_custom_meta_box_for_word_category($post)
{
    // Lấy giá trị hiện tại của trường tùy chỉnh nếu có
    $client_value = get_post_meta($post->ID, 'client', true);
    ?>
    <label for="client">Client</label>
    <input style="width: 100%" type="text" name="client" id="client" value="<?php echo esc_attr($client_value); ?>">
    <?php

    $heroVimeoId = get_post_meta($post->ID, 'hero_vimeo_id', true);
    ?>
    <label for="hero_vimeo_id">Vimeo video id (Video which is shown on the banner of the post)</label>
    <input style="width: 100%" type="text" name="hero_vimeo_id" id="hero_vimeo_id"
        value="<?php echo esc_attr($heroVimeoId); ?>">
    <?php
}

function render_custom_meta_box_for_news_category($post)
{
    $location = get_post_meta($post->ID, 'location', true);
    ?>
    <label for="location">Choose your location</label>
    <input style="width: 100%" type="text" name="location" id="location" value="<?php echo esc_attr($location); ?>">
    <?php

    $redirectUrl = get_post_meta($post->ID, 'redirectUrl', true);
    ?>
    <label for="redirectUrl">Direct URL (if any)</label>
    <input style="width: 100%" type="text" name="redirectUrl" id="redirectUrl"
        value="<?php echo esc_attr($redirectUrl); ?>">
    <?php
}

function save_custom_meta_box_values($post_id)
{
    // Kiểm tra xem người dùng có quyền chỉnh sửa bài viết không
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Lưu giá trị của trường tùy chỉnh cho danh mục "Word"
    if (isset($_POST['client'])) {
        update_post_meta($post_id, 'client', sanitize_text_field($_POST['client']));
    }

    if (isset($_POST['hero_vimeo_id'])) {
        update_post_meta($post_id, 'hero_vimeo_id', sanitize_text_field($_POST['hero_vimeo_id']));
    }

    if (isset($_POST['location'])) {
        update_post_meta($post_id, 'location', sanitize_text_field($_POST['location']));
    }
    if (isset($_POST['redirectUrl'])) {
        update_post_meta($post_id, 'redirectUrl', sanitize_text_field($_POST['redirectUrl']));
    }
}
add_action('save_post', 'save_custom_meta_box_values');

function custom_featured_image_text($content)
{
    // Thay đổi văn bản của nút "Set featured image"
    $content = str_replace('Set featured image', 'Set Banner image', $content);
    $content = str_replace('Remove featured image', 'Remove Banner image', $content);

    return $content;
}
add_filter('admin_post_thumbnail_html', 'custom_featured_image_text');


// Xử lý dữ liệu khi nhận request AJAX
function handle_sortable_items()
{
    if (isset($_POST['item_ids']) && isset($_POST['new_order'])) {
        $item_ids = $_POST['item_ids'];
        $new_order = $_POST['new_order'];

        // Cập nhật thứ tự mới của các mục trong cơ sở dữ liệu
        foreach ($item_ids as $index => $item_id) {
            // Update the position/order of the item in the database
            // Example: Update the 'menu_order' field for posts or custom post types
            wp_update_post(
                array(
                    'ID' => $item_id,
                    'menu_order' => $new_order[$index]
                )
            );
        }

        // Phản hồi về thành công hoặc lỗi
        wp_send_json_success('Sort order updated successfully.');
    } else {
        wp_send_json_error('Invalid request.');
    }
}
add_action('wp_ajax_handle_sortable_items', 'handle_sortable_items');

add_action('admin_footer', function () {
    global $pagenow;
    if ($pagenow == 'edit.php' && isset ($_GET['post_type']) && $_GET['post_type'] == 'post' && isset ($_GET['category_name'])) {
        ?>
        <script>
            jQuery(function ($) {
                $('#the-list').sortable({
                    update: function (event, ui) {
                        var itemIds = $(this).sortable('toArray');
                        const postId = []
                        var newOrder = {};
                        $.each(itemIds, function (index, itemId) {
                            postId.push(itemId.replace('post-', ''));
                            newOrder[itemId] = index + 1;
                        });
                        console.log(postId)
                        console.log(newOrder)

                        $.ajax({
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            type: 'POST',
                            data: {
                                action: 'handle_sortable_items',
                                item_ids: itemIds,
                                new_order: newOrder
                            },
                            success: function (response) {
                                console.log(response.data);
                            },
                            error: function (xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                });
            });
        </script>
        <?php
    }
});