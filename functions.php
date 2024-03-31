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
    add_theme_support('menus');
}
;

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
}
add_action('customize_register', 'theme_customizer_settings');
function custom_single_template($single_template)
{
    global $post;

    if ($post->post_type == 'post') {
        $single_template = locate_template(array('work-single.php'));
    }

    return $single_template;
}
add_filter('single_template', 'custom_single_template');



function banner_customizer_settings($wp_customize)
{
    $wp_customize->add_section(
        'banner_section',
        array(
            'title' => __('Banner Settings', 'theme'),
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
                'section' => 'banner_section',
                'type' => 'media',
                'settings' => 'banner_video',
            )
        )
    );
}
add_action('customize_register', 'banner_customizer_settings');

//Add meta box in the post or page
add_action('add_meta_boxes', 'custom_postpage_meta_box');
function custom_postpage_meta_box()
{

    $post_types = array('post');
    foreach ($post_types as $pt) {
        add_meta_box(
            'custom_postpage_meta_box',
            __('More Featured Images', 'textdomain'),
            'custom_postpage_meta_box_func',
            $pt,
            'side',
            'low'
        );
    }
}

function custom_postpage_meta_box_func($post)
{

    $meta_keys = array('second_featured_image');

    foreach ($meta_keys as $meta_key) {
        $image_meta_val = get_post_meta($post->ID, $meta_key, true);
        ?>
        <div class="custom_postpage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');"
                src="<?php echo ($image_meta_val != '' ? wp_get_attachment_image_src($image_meta_val)[0] : ''); ?>"
                style="width:100%;cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>" alt="">
            <a class="addimage" style="cursor:pointer;" onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');">
                <?php _e('Set featured image', 'textdomain'); ?>
            </a><br>
            <a class="removeimage" style="cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>"
                onclick="custom_postpage_remove_image('<?php echo $meta_key; ?>');">
                <?php _e('Remove featured image', 'textdomain'); ?>
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

        $meta_keys = array('second_featured_image');
        foreach ($meta_keys as $meta_key) {
            if (isset($_POST[$meta_key]) && intval($_POST[$meta_key]) != '') {
                update_post_meta($post_id, $meta_key, intval($_POST[$meta_key]));
            } else {
                update_post_meta($post_id, $meta_key, '');
            }
        }
    }
}
