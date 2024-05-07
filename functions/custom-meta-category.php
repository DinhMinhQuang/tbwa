<?php
// Hàm sẽ được gọi khi trang chỉnh sửa danh mục được tạo ra
function custom_category_fields($term)
{
    // Lấy giá trị hiện tại của các trường nếu có
    $field1_value = get_term_meta($term->term_id, 'banner_title', true);
    $field2_value = get_term_meta($term->term_id, 'title_intro', true);
    $field3_value = get_term_meta($term->term_id, 'description_intro', true);
    $banner_title_vi = get_term_meta($term->term_id, 'banner_title_vi', true);
    $title_intro_vi = get_term_meta($term->term_id, 'title_intro_vi', true);
    $description_intro_vi = get_term_meta($term->term_id, 'description_intro_vi', true);
    $image_url = get_term_meta($term->term_id, 'banner_image', true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="banner_title">Banner Title</label></th>
        <td>
            <input type="text" name="banner_title" id="banner_title" value="<?php echo esc_attr($field1_value); ?>" />
            <p class="description">Banner Title.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="title_intro">Title Intro</label></th>
        <td>
            <input type="text" name="title_intro" id="title_intro" value="<?php echo esc_attr($field2_value); ?>" />
            <p class="description">Enter title intro for work list.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="description_intro">Description Intro</label></th>
        <td>
            <textarea name="description_intro" id="description_intro"
                rows="5"><?php echo esc_textarea($field3_value); ?></textarea>
            <p class="description">Enter description intro for work list.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="banner_title_vi">Banner Title Vietnamese</label></th>
        <td>
            <input type="text" name="banner_title_vi" id="banner_title_vi"
                value="<?php echo esc_attr($banner_title_vi); ?>" />
            <p class="description">Banner Title.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="title_intro_vi">Title Intro Vietnamese</label></th>
        <td>
            <input type="text" name="title_intro_vi" id="title_intro_vi" value="<?php echo esc_attr($title_intro_vi); ?>" />
            <p class="description">Enter title intro for work list.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="description_intro_vi">Description Intro Vietnamese</label></th>
        <td>
            <textarea name="description_intro_vi" id="description_intro_vi"
                rows="5"><?php echo esc_textarea($description_intro_vi); ?></textarea>
            <p class="description">Enter description intro for work list.</p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row"><label for="banner_image">Category Image</label></th>
        <td>
            <input type="text" name="banner_image" id="banner_image" value="<?php echo esc_attr($image_url); ?>" readonly />
            <button type="button" class="button button-secondary" id="upload_image_button">Upload Image</button>
            <p class="description">Upload or select an image for this category.</p>
            <script>
                jQuery(document).ready(function ($) {
                    $('#upload_image_button').click(function () {
                        var send_attachment_bkp = wp.media.editor.send.attachment;
                        wp.media.editor.send.attachment = function (props, attachment) {
                            $('#banner_image').val(attachment.url);
                            wp.media.editor.send.attachment = send_attachment_bkp;
                        }
                        wp.media.editor.open();
                        return false;
                    });
                });
            </script>
        </td>
    </tr>
    <?php
}
add_action('edit_category_form_fields', 'custom_category_fields');

// Hàm sẽ được gọi khi bạn lưu danh mục
function save_custom_category_fields($term_id)
{
    // Mảng chứa tên của các trường và loại dữ liệu tương ứng
    $fields = array(
        'banner_title' => 'wp_kses_post',
        'title_intro' => 'sanitize_text_field',
        'description_intro' => 'wp_kses_post',
        'banner_title_vi' => 'wp_kses_post',
        'title_intro_vi' => 'sanitize_text_field',
        'description_intro_vi' => 'wp_kses_post',
        'banner_image' => 'esc_url_raw'
    );

    // Duyệt qua mảng các trường để lưu dữ liệu
    foreach ($fields as $field_name => $sanitize_callback) {
        if (isset($_POST[$field_name])) {
            // Lưu giá trị của trường
            $value = call_user_func($sanitize_callback, $_POST[$field_name]);
            update_term_meta($term_id, $field_name, $value);
        }
    }
}
add_action('edited_category', 'save_custom_category_fields');