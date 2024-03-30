<?php
function theme_supports()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'theme_supports');

function tbwa_menus()
{
    $location = array(
        'primary' => "Desktop Primary"
    );
    register_nav_menus($location);
}
;
add_action('init', 'tbwa_menus');

function tbwa_styles()
{
    wp_enqueue_style(
        'tbwa-video-js',
        get_template_directory_uri() . '/Tequila_Vietnam_files/video-js.css',
        array(),
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'videojs-playlist-ui.vertical',
        get_template_directory_uri() . '/Tequila_Vietnam_files/videojs-playlist-ui.vertical.css',
        array(),
        '1.0',
        'all'
    );
    wp_enqueue_style(
        'tbwa-main-min',
        get_template_directory_uri() .
        '/Tequila_Vietnam_files/main.min.css',
        array(),
        '1.0',
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
        'global-min-js',
        get_template_directory_uri() .
        '/assets/js/global.min.js',
        array(),
        '1.0',
        true
    );

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