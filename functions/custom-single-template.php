<?php
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