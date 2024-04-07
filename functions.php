<?php
function theme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_supports');

function tbwa_menus($locations = array())
{
    // remove category prefix 
    global $wp_rewrite;
    $wp_rewrite->category_base = '';

    add_theme_support('menus');
}

add_action('init', 'tbwa_menus');

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
        null,
        'all'
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
            __('Back Thumbnail', 'textdomain'),
            'custom_postpage_meta_box_func_1',
            $pt,
            'side',
            'low'
        );

        // Meta box 2
        add_meta_box(
            'custom_postpage_meta_box_front',
            __('Front Thumbnail', 'textdomain'),
            'custom_postpage_meta_box_func_2',
            $pt,
            'side',
            'low'
        );

        // Section Post Thumbnail
        add_meta_box(
            'custom_postpage_meta_box_thumbnail',
            __('Section Thumbnail', 'textdomain'),
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
                <?php _e('Set Back image', 'textdomain'); ?>
            </a><br>
            <a class="removeimage" style="cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>"
                onclick="custom_postpage_remove_image('<?php echo $meta_key; ?>');">
                <?php _e('Remove Back image', 'textdomain'); ?>
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
                <?php _e('Set Front image', 'textdomain'); ?>
            </a><br>
            <a class="removeimage" style="cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>"
                onclick="custom_postpage_remove_image('<?php echo $meta_key; ?>');">
                <?php _e('Remove Front image', 'textdomain'); ?>
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
                <?php _e('Set Section image', 'textdomain'); ?>
            </a><br>
            <a class="removeimage" style="cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>"
                onclick="custom_postpage_remove_image('<?php echo $meta_key; ?>');">
                <?php _e('Remove Section image', 'textdomain'); ?>
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
    // Thêm section mới cho nội dung "Home Disruption"
    $wp_customize->add_section(
        'home_disruption_section',
        array(
            'title' => 'Home Disruption', // Tiêu đề của section
            'priority' => 30,
        )
    );

    // Thêm thiết lập cho nội dung "Home Disruption"
    $wp_customize->add_setting(
        'home_disruption_first_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_first_title',
        array(
            'label' => 'Home Disruption First Title',
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

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_first_content',
        array(
            'label' => 'Home Disruption First Content',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );


    $wp_customize->add_setting(
        'home_disruption_first_link',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_first_link',
        array(
            'label' => 'Home Disruption First Link',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'textarea',
        )
    );


    $wp_customize->add_setting(
        'home_disruption_second_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_second_title',
        array(
            'label' => 'Home Disruption Second Title',
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

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_second_content',
        array(
            'label' => 'Home Disruption Second Content',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );

    // Control cho content thứ 2 
    $wp_customize->add_setting(
        'home_disruption_second_link',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_second_link',
        array(
            'label' => 'Home Disruption Second Link',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'textarea',
        )
    );
}
add_action('customize_register', 'customizer_settings_disruption');

function customizer_settings_pirates($wp_customize)
{
    // Thêm section mới cho nội dung "Home Disruption"
    $wp_customize->add_section(
        'home_pirates_section',
        array(
            'title' => 'Home Pirates', // Tiêu đề của section
            'priority' => 30,
        )
    );

    // Thêm thiết lập cho nội dung "Home Disruption"
    $wp_customize->add_setting(
        'home_pirates_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_pirates_section'
    $wp_customize->add_control(
        'home_pirates_title',
        array(
            'label' => 'Home Disruption First Title',
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
            'label' => 'Home Disruption First Content',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'text',
        )
    );


    $wp_customize->add_setting(
        'home_pirates_link',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_pirates_link',
        array(
            'label' => 'Home Pirates Link',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'textarea',
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
            'title' => 'Home Work', // Tiêu đề của section
            'priority' => 30,
        )
    );

    // Thêm thiết lập cho nội dung "Home Disruption"
    $wp_customize->add_setting(
        'home_work_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_pirates_section'
    $wp_customize->add_control(
        'home_work_title',
        array(
            'label' => 'Home Work Title',
            'section' => 'home_work_section', // Chọn section mới
            'type' => 'text',
        )
    );

    // Thêm thiết lập cho nội dung "Home Disruption"
    $wp_customize->add_setting(
        'home_work_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_pirates_section'
    $wp_customize->add_control(
        'home_work_content',
        array(
            'label' => 'Home Work Content',
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
            'title' => __('Footer', 'textdomain'),
            'priority' => 200,
        )
    );

    // Thêm Setting cho nội dung footer
    $wp_customize->add_setting(
        'business_inquiries_first_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho nội dung footer
    $wp_customize->add_control(
        'business_inquiries_first_title',
        array(
            'label' => __('Business Inquiries First Title', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    // Thêm Setting cho nội dung footer
    $wp_customize->add_setting(
        'business_inquiries_first_name',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho nội dung footer
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

    // Thêm Control cho nội dung footer
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

    // Thêm Control cho nội dung footer
    $wp_customize->add_control(
        'business_inquiries_second_title',
        array(
            'label' => __('Business Inquiries Second Title', 'textdomain'),
            'section' => 'extra_data',
            'type' => 'text',
        )
    );

    // Thêm Setting cho nội dung footer
    $wp_customize->add_setting(
        'business_inquiries_second_name',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho nội dung footer
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

    // Thêm Control cho nội dung footer
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

    // Thêm Control cho nội dung footer
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

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
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

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
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

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
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

    // Thêm control cho nội dung "Home Disruption" và đặt trong section 'home_disruption_section'
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

    // Thêm Control cho nội dung footer
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

    // Thêm Control cho nội dung footer
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

    // Thêm Control cho nội dung footer
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

    // Thêm Control cho nội dung footer
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

    // Thêm Control cho nội dung footer
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
            'title' => __('Home Slider', 'theme'),
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
            'label' => 'Slider Video Our Work Url',
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
            'label' => 'Text Button Slider Video Our Work',
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
            'label' => 'Slider Video Disruption Url',
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
            'label' => 'Text Button Slider Video Disruption',
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
            'label' => 'Slider Video Our Software Url',
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
            'label' => 'Text Button Slider Video Our Software',
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
            'label' => 'Slider Video Our Work Url',
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
            'label' => 'Text Button Slider Video Our Work',
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
            'label' => 'Slider Video Our Pirate Url',
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
            'label' => 'Text Button Slider Video Our Pirate',
            'section' => 'slider_video_section',
            'type' => 'text',
        )
    );

}
add_action('customize_register', 'home_slider_customize');

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
        update_term_meta($term_id, 'banner_title', sanitize_text_field($_POST['banner_title']));
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