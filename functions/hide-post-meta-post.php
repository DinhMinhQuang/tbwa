<?php
function hide_post_meta_boxes()
{
    remove_meta_box('trackbacksdiv', 'post', 'normal');
    remove_meta_box('commentsdiv', 'post', 'normal');
    remove_meta_box('postcustom', 'post', 'normal');
    remove_meta_box('commentstatusdiv', 'post', 'normal');
    remove_meta_box('tagsdiv-post_tag', 'post', 'side');
    remove_meta_box('postimagediv', 'post', 'side');

    remove_meta_box('trackbacksdiv', 'page', 'normal');
    remove_meta_box('commentsdiv', 'page', 'normal');
    remove_meta_box('postcustom', 'page', 'normal');
    remove_meta_box('commentstatusdiv', 'page', 'normal');

    remove_meta_box('postimagediv', 'page', 'side');
}
add_action('do_meta_boxes', 'hide_post_meta_boxes');