<?php
function add_custom_meta_boxes_based_on_category($post_type, $post)
{
    if ($post_type === 'post') {
        add_meta_box('custom_meta_box_for_word_category', 'Apply for page Work', 'render_custom_meta_box_for_word_category', $post_type, 'normal', 'default', $post);
        add_meta_box('custom_meta_box_for_news_category', 'Apply for page News', 'render_custom_meta_box_for_news_category', $post_type, 'normal', 'default', $post);
    }
}
add_action('add_meta_boxes', 'add_custom_meta_boxes_based_on_category', 10, 2);