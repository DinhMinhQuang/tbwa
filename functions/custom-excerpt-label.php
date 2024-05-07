<?php
function custom_excerpt_label($translated_text, $text, $domain)
{
    // Kiểm tra xem đang ở trang chỉnh sửa bài viết và text đang được dịch có phải là "Excerpt" không
    if (is_admin() && $text === 'Excerpt') {
        // Thay đổi label thành chuỗi mới bạn muốn
        $translated_text = 'Excerpt (secondary post title)';
    }
    return $translated_text;
}
add_filter('gettext', 'custom_excerpt_label', 20, 3);