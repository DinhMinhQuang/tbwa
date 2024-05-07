<?php
function change_cat_meta_box()
{
    global $wp_meta_boxes;
    unset($wp_meta_boxes['post']['side']['core']['categorydiv']);
    add_meta_box(
        'categorydiv',
        __('*Categories'),
        'post_categories_meta_box',
        'post',
        'side',
        'low'
    );
}

add_action('add_meta_boxes', 'change_cat_meta_box', 0);

function custom_category_css()
{
    ?>
    <style>
        #categorydiv h2 {
            color: #ff0000;
            /* Thay đổi màu sắc thành màu đỏ */
        }
    </style>
    <?php
}
add_action('admin_head', 'custom_category_css');