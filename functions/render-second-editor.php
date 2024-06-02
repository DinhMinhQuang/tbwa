<?php
function render_custom_meta_box_editor($post)
{
    // Lấy nội dung từ trình soạn thảo nếu có
    $content = get_post_meta($post->ID, 'custom_editor', true);

    // Thiết lập ID và các thiết lập cho trình soạn thảo
    $editor_id = 'custom_editor'; // ID của trình soạn thảo
    $settings = array(
        'textarea_name' => 'custom_editor', // Tên của trường dữ liệu sẽ lưu nội dung
    );

    // Hiển thị trình soạn thảo với nội dung được lấy
    wp_editor($content, $editor_id, $settings);
}

add_action('add_meta_boxes', 'custom_meta_boxes_for_work_page');

function custom_meta_boxes_for_work_page()
{
    $post_type = 'post'; // Đổi post type nếu cần
    add_meta_box(
        'custom_editor_meta_box',
        __('Media Content', 'textdomain'),
        'render_custom_meta_box_editor',
        $post_type,
        'normal',
        'high'
    );
}