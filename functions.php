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

/* Classic Editor Pages Posts */
add_filter('use_block_editor_for_post', '__return_false');


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

    add_rewrite_rule(
        '^vi/work/page/([0-9]+)/?$',
        'index.php?category_name=work&paged=$matches[1]',
        'top'
    );
    add_rewrite_rule(
        '^vi/news/page/([0-9]+)/?$',
        'index.php?category_name=news&paged=$matches[1]',
        'top'
    );
}
add_action('init', 'custom_rewrite_rules');

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
    if (is_single() && !in_category('pirates')) {
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

$roots_includes = array(
    'functions/hide-post-meta-post.php',
    'functions/custom-logo-side-identity.php',
    'functions/custom-single-template.php',
    'functions/customize-field-side-identity.php',
    'functions/customize-setting-disruption.php',
    'functions/customize-setting-pirates.php',
    'functions/customize-setting-work.php',
    'functions/custom-walker-nav-menu.php',
    'functions/custom-customize-preview-notice.php',
    'functions/custom-extra-information.php',
    'functions/render-second-editor.php',
    'functions/customize-home-slider.php',
    'functions/render-custom-post-image.php',
    'functions/custom-excerpt-label.php',
    'functions/custom-field-work.php',
    'functions/custom-page-disruption.php',
    'functions/custom-page-about.php',
    'functions/save-custom-meta-page.php',
    'functions/custom-meta-category.php',
    'functions/custom-field-news.php',
    'functions/custom-category-meta-box.php',
    'functions/render-custom-meta-post.php',
);

foreach ($roots_includes as $file) {
    $filepath = get_template_directory() . '/' . $file;
    if (!file_exists($filepath)) {
        trigger_error("Error locating `$file` for inclusion!", E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);


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

function add_language_filter_to_posts()
{
    global $typenow;
    global $pagenow;
    if ($pagenow === 'edit.php' && ($typenow == 'post' || $typenow == 'page')) {
        $selected = isset($_GET['language']) ? $_GET['language'] : 'en'; // Đặt mặc định là 'en' cho tiếng Anh
        $languages = array('vi' => 'Vietnamese', 'en' => 'English'); // Thay đổi giá trị và nhãn tùy theo ngôn ngữ bạn muốn hỗ trợ

        echo '<select name="language">';
        foreach ($languages as $value => $label) {
            echo '<option value="' . $value . '" ' . selected($selected, $value, false) . '>' . $label . '</option>';
        }
        echo '</select>';
    }
}
add_action('restrict_manage_posts', 'add_language_filter_to_posts');
function add_language_default_to_query($query)
{
    if (is_admin() && $query->is_main_query()) {
        global $pagenow;
        if ('edit.php?post_type=post' === $pagenow && ($query->get('post_type') == 'post' || $query->get('post_type') == 'page')) {
            $language = isset($_GET['language']) ? $_GET['language'] : 'en'; // Mặc định là tiếng Anh
            $meta_query = array(
                array(
                    'key' => 'language', // Thay 'language_field' bằng tên trường ngôn ngữ thực tế
                    'value' => $language,
                    'compare' => '='
                )
            );
            $query->set('meta_query', $meta_query);
        }
    }
}
add_action('pre_get_posts', 'add_language_default_to_query');

function filter_posts_by_language($query)
{
    global $pagenow;
    if (is_admin() && $pagenow == 'edit.php' && isset($_GET['language']) && $_GET['language'] != '') {
        if ($query->get('post_type') == 'post' || $query->get('post_type') == 'page') {
            $query->set('meta_key', 'language');
            $query->set('meta_value', $_GET['language']);
        }
    }
}

add_filter('parse_query', 'filter_posts_by_language');

function add_language_column($columns)
{
    $columns['language'] = 'Language';
    return $columns;
}
add_filter('manage_posts_columns', 'add_language_column');
add_filter('manage_pages_columns', 'add_language_column');

function display_language_column($column, $post_id)
{
    if ($column == 'language') {
        $language = get_post_meta($post_id, 'language', true);
        if ($language === 'vi') {
            echo "Vietnamese";
        } else {
            echo "English";
        }
    }
}
add_action('manage_posts_custom_column', 'display_language_column', 10, 2);
add_action('manage_pages_custom_column', 'display_language_column', 10, 2);


// Tạo custom field cho ngôn ngữ
function custom_language_custom_field()
{
    add_meta_box(
        'language',
        '<span style="color:red">' . __('Language') . '</span>',
        'custom_language_field_callback',
        array('post', 'page'),
        'side',
        'default',
    );
}
add_action('add_meta_boxes', 'custom_language_custom_field');

function custom_language_field_callback($post)
{
    $language = get_post_meta($post->ID, 'language', true);
    ?>
    <label for="language"><?php _e('Language'); ?></label>
    <select name="language" id="language">
        <option value="en" <?php selected($language, 'en'); ?>>English</option>
        <option value="vi" <?php selected($language, 'vi'); ?>>Vietnamese</option>
    </select>
    <?php
}

function save_custom_language_field($post_id)
{
    if (isset($_POST['language'])) {
        update_post_meta($post_id, 'language', sanitize_text_field($_POST['language']));
    }
}
add_action('save_post', 'save_custom_language_field');

function custom_rewrite_rule_vi()
{
    // Thêm rewrite rule cho các category có tiền tố /vi
    add_rewrite_rule('^vi/pirates/?$', 'index.php?category_name=pirates', 'top');
    add_rewrite_rule('^vi/work/?$', 'index.php?category_name=work', 'top');
    add_rewrite_rule('^vi/news/?$', 'index.php?category_name=news', 'top');

    // Thêm rewrite rule cho các trang bài viết có tiền tố /vi
    add_rewrite_rule('^vi/([^/]+)/([^/]+)/?$', 'index.php?category_name=$matches[1]&name=$matches[2]', 'top');
    // Thêm rewrite rule cho URL có tiền tố /vi
    add_rewrite_rule('^vi/?$', 'index.php', 'top');

    $template = get_page_template_slug(get_queried_object_id());
    if ($template === 'about.php' || $template === 'disruption.php') {
        add_rewrite_rule(
            '^vi/([^/]+)/?$',
            'index.php?pagename=$matches[1]-vn',
            'top'
        );
    } else {
        add_rewrite_rule('^vi/([^/]+)/?$', 'index.php?pagename=$matches[1]', 'top');
    }

    flush_rewrite_rules(); // Cập nhật lại rewrite rules
}
add_action('init', 'custom_rewrite_rule_vi');

function add_language_and_category_to_permalink($permalink, $post, $leavename)
{
    if (get_post_type($post) !== 'post') {
        return $permalink;
    }

    $language = get_post_meta($post->ID, 'language', true);
    if ($language === 'vi') {
        $categories = get_the_category($post->ID);

        $category_slugs = array();

        foreach ($categories as $category) {
            $category_slugs[] = $category->slug;
        }

        $category_slugs_str = implode('/', $category_slugs);
        $permalink = home_url('/vi/' . $category_slugs_str . '/' . $post->post_name . '/');

    }
    return $permalink;
}
add_filter('post_link', 'add_language_and_category_to_permalink', 10, 3);

function custom_page_permalink($permalink, $post_id, $leavename)
{
    $page = get_post($post_id);
    $template = get_page_template_slug($post_id);

    $language = get_post_meta($post_id, 'language', true);
    $custom_slug = get_post_meta($post_id, 'custom_slug', true);

    // Kiểm tra template có phải là 'about' hoặc 'disruption'
    if ($template === 'about.php' || $template === 'disruption.php') {
        if ($language === 'vi' && $custom_slug) {
            // Tạo permalink với tiền tố '/vi'
            $permalink = home_url('/vi/' . $custom_slug . '/');
        }
    } else {
        // Nếu không phải template 'about' hoặc 'disruption', sử dụng post_name
        $permalink = home_url('/vi/' . $page->post_name . '/');
    }

    return $permalink;
}
add_filter('page_link', 'custom_page_permalink', 10, 3);

function set_language_in_html_tag($output)
{
    // Kiểm tra ngôn ngữ từ URL
    $current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $path_parts = explode('/', trim(parse_url($current_url, PHP_URL_PATH), '/'));
    $language = isset($path_parts[1]) ? $path_parts[1] : '';

    // Nếu ngôn ngữ là tiếng Việt, thêm lang="vi" vào phần tử <html>
    if ($language === 'vi') {
        $output = preg_replace('/lang="en-US"/', 'lang="vi_VN"', $output);
    }

    return $output;
}
add_filter('language_attributes', 'set_language_in_html_tag');

// function update_post_order()
// {
//     global $wpdb;

//     $postOrder = $_POST['postOrder'];
//     foreach ($postOrder as $order => $postId) {
//         $postId = str_replace('post-', '', $postId);
//         // Check if the post is in the 'news' category and the language is 'vi'
//         if (in_category('news', $postId) && get_post_meta($postId, 'language', true) == 'vi') {
//             $wpdb->update($wpdb->posts, array('menu_order' => $order), array('ID' => $postId));
//         }
//     }
// }
// add_action('wp_ajax_update_post_order', 'update_post_order');

// function increase_menu_order_on_publish($new_status, $old_status, $post)
// {
//     error_log('$new_status' . $new_status);
//     error_log('$old_status' . $old_status);
//     if ($old_status != 'publish' && $new_status == 'publish') {
//         error_log('this post in category work ?' . in_category('work', $post));
//         if (in_category('work', $post)) {
//             error_log('Meta field ? ' . get_post_meta($post->ID, 'language', true));

//             if (get_post_meta($post->ID, 'language', true) == 'vi') {
//                 $highest_menu_order = new WP_Query(
//                     array(
//                         'post_type' => 'post',
//                         'category_name' => 'work',
//                         'orderby' => 'menu_order',
//                         'order' => 'DESC',
//                         'posts_per_page' => 1,
//                         'meta_query' => array(
//                             array(
//                                 'key' => 'language',
//                                 'value' => 'vi',
//                             )
//                         )
//                     )
//                 );
//                 $highest_menu_order = $highest_menu_order->have_posts() ? get_post($highest_menu_order->posts[0])->menu_order : 0;
//                 global $wpdb;
//                 $wpdb->update(
//                     $wpdb->posts,
//                     array('menu_order' => $highest_menu_order + 1), // data
//                     array('ID' => $post->ID), // where
//                     array('%d'), // data format
//                     array('%d') // where format
//                 );
//             }
//             if (get_post_meta($post->ID, 'language', true) == 'en') {
//                 error_log('en ?');
//                 $highest_menu_order = new WP_Query(
//                     array(
//                         'post_type' => 'post',
//                         'category_name' => 'work',
//                         'orderby' => 'menu_order',
//                         'order' => 'DESC',
//                         'posts_per_page' => 1,
//                         'meta_query' => array(
//                             array(
//                                 'key' => 'language',
//                                 'value' => 'en',
//                             )
//                         )
//                     )
//                 );
//                 $highest_menu_order = $highest_menu_order->have_posts() ? get_post($highest_menu_order->posts[0])->menu_order : 0;
//                 error_log('$highest_menu_order ' . $highest_menu_order + 1);
//                 global $wpdb;
//                 $wpdb->update(
//                     $wpdb->posts,
//                     array('menu_order' => $highest_menu_order + 1), // data
//                     array('ID' => $post->ID), // where
//                     array('%d'), // data format
//                     array('%d') // where format
//                 );
//             }
//         }
//     }
// }
// add_action('transition_post_status', 'increase_menu_order_on_publish', 10, 3);