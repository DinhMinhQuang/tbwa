<?php
addAction('after_setup_theme', 'theme_slug_setup');

function theme_slug_setup()
{
    add_theme('wp-block-styles');
}
wp_enqueue_style(
    'theme-slug-example',
    get_parent_theme_file_uri('assets/css/example.css'),
    array(),
    wp_get_theme()->get('Version'),
    'all'
);

include get_parent_theme_file_path('inc/helpers.php');
include get_theme_file_path('inc/helpers.php');
