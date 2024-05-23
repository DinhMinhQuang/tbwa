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
        if ('edit.php' === $pagenow && ($query->get('post_type') == 'post' || $query->get('post_type') == 'page')) {
            $language = isset($_GET['language']) ? $_GET['language'] : 'en'; // Mặc định là tiếng Anh
            $query->set(
                'meta_query',
                array(
                    array(
                        'key' => 'language',
                        'value' => sanitize_text_field($language),
                        'compare' => '='
                    )
                )
            );
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

// Hook the function to the 'parse_query' action
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

    add_rewrite_rule(
        '^vi/about/?$',
        'index.php?pagename=about-vn',
        'top'
    );
    add_rewrite_rule(
        '^vi/disruption/?$',
        'index.php?pagename=disruption-vn',
        'top'
    );
    add_rewrite_rule('^vi/([^/]+)/?$', 'index.php?pagename=$matches[1]', 'top');


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
    if ($template === 'page-about.php' || $template === 'page-disruption.php') {
        if ($language === 'vi') {
            // Tạo permalink với tiền tố '/vi'
            $permalink = home_url('/vi/' . $custom_slug . '/');
        }
    } else {
        if ($language === 'vi') {
            $permalink = home_url('/vi/' . $page->post_name . '/');
        }
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

function response_url($language)
{
    $url = ''; // Tạo một biến rỗng để lưu trữ URL

    if (is_front_page()) {
        if ($language === '_vi') {
            $url = 'https://tbwa.com.vn/vi/';
        } else {
            $url = 'https://tbwa.com.vn/';
        }
    }
    if (is_category()) {
        $category = get_queried_object();
        $category_slug = $category->slug;
        if ($language === '_vi') {
            $url = "https://tbwa.com.vn/vi/" . $category_slug;
        } else {
            $url = "https://tbwa.com.vn/" . $category_slug;
        }
    }
    if (is_page('privacy-policy') || is_page('chinh-sach-bao-mat')) {
        if ($language === '_vi') {
            $url = "https://tbwa.com.vn/vi/" . "chinh-sach-bao-mat";
        } else {
            $url = "https://tbwa.com.vn/" . "privacy-policy";
        }
    }
    if (is_page('terms-of-service') || is_page('dieu-khoan-dich-vu')) {
        if ($language === '_vi') {
            $url = "https://tbwa.com.vn/vi/" . "dieu-khoan-dich-vu";
        } else {
            $url = "https://tbwa.com.vn/" . "terms-of-service";
        }
    }
    if (is_page('about')) {
        if ($language === '_vi') {
            $url = "https://tbwa.com.vn/vi/" . "about-vn";
        } else {
            $url = "https://tbwa.com.vn/" . "about";
        }
    }
    if (is_page('disruption')) {
        if ($language === '_vi') {
            $url = "https://tbwa.com.vn/vi/" . "disruption-vn";
        } else {
            $url = "https://tbwa.com.vn/" . "disruption";
        }
    }
    if (is_page('about-vn')) {
        if ($language === '_vi') {
            $url = "https://tbwa.com.vn/vi/about";
        } else {
            $url = "https://tbwa.com.vn/about";
        }
    }
    if (is_page('disruption-vn')) {
        if ($language === '_vi') {
            $url = "https://tbwa.com.vn/vi/disruption";
        } else {
            $url = "https://tbwa.com.vn/disruption";
        }
    }
    if (is_single()) {
        $post = get_queried_object();
        $categories = get_the_category($post->ID);
        $category_slug = $categories[0]->slug;
        if ($language === '_vi') {
            $url = "https://tbwa.com.vn/vi/" . $category_slug;
        } else {
            $url = "https://tbwa.com.vn/" . $category_slug;
        }
    }

    return $url;
}

function save_post_order()
{
    global $wpdb;

    $order = explode(',', $_POST['order']);
    $counter = 0;

    foreach ($order as $post_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $post_id));
        $counter++;
    }
    die(1);
}
add_action('wp_ajax_save_post_order', 'save_post_order');

function enqueue_sortable_scripts()
{
    $category = isset($_GET['cat']) ? $_GET['cat'] : '';
    $language = isset($_GET['language']) ? $_GET['language'] : '';
    if ($category === '22' && ($language === 'en' || $language === 'vi')) {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $('#the-list').sortable({
                    cursor: 'move',
                    axis: 'y',
                    scrollSensitivity: 40,
                    stop: function (event, ui) {
                        ui.item.css('background-color', '#0000');
                    },
                    update: function (event, ui) {
                        var order = $('#the-list').sortable('toArray', { attribute: 'id' });
                        orders = order.map(function (post_id) {
                            return post_id.replace('post-', '');
                        });
                        $.post(ajaxurl, {
                            action: 'save_post_order',
                            order: orders.join(',')
                        });
                    }
                });
            });
        </script>
        <?php
    }
}

add_action('admin_footer', 'enqueue_sortable_scripts');

function sort_posts_by_menu_order($query)
{
    // Check if the query is for an archive
    if ($query->is_archive()) {
        $language = isset($_GET['language']) ? $_GET['language'] : '';
        $cat = isset($_GET['cat']) ? $_GET['cat'] : '';

        // Only sort the posts if the language is 'en' and the category is 'work'
        if (($language === 'en' || $language === 'vi') && $cat === '22') {
            // Set the 'orderby' parameter to 'menu_order'
            $query->set('orderby', 'menu_order');
            // Set the 'order' parameter to 'ASC'
            $query->set('order', 'ASC');
        }
    }
}
add_action('pre_get_posts', 'sort_posts_by_menu_order');