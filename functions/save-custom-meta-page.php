<?php

/* Save Disruption & About */
function save_disruption_meta_box($post_id)
{
    if (get_post_type($post_id) !== 'page') {
        return;
    }
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