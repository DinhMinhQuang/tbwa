<?php

function save_custom_meta_box_values($post_id)
{
    if (get_post_type($post_id) !== 'post') {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Lưu giá trị của trường tùy chỉnh cho danh mục "Word"
    if (isset($_POST['client'])) {
        update_post_meta($post_id, 'client', sanitize_text_field($_POST['client']));
    }

    if (isset($_POST['hero_vimeo_id'])) {
        update_post_meta($post_id, 'hero_vimeo_id', sanitize_text_field($_POST['hero_vimeo_id']));
    }

    if (isset($_POST['location'])) {
        update_post_meta($post_id, 'location', sanitize_text_field($_POST['location']));
    }
    if (isset($_POST['redirectUrl'])) {
        update_post_meta($post_id, 'redirectUrl', sanitize_text_field($_POST['redirectUrl']));
    }
    if (isset($_POST['custom_editor'])) {
        // Lưu nội dung từ trình soạn thảo vào trường dữ liệu custom_editor của bài viết
        update_post_meta($post_id, 'custom_editor', $_POST['custom_editor']);
    }

    if (isset($_POST['highlight_home'])) {
        $checkbox_value = sanitize_text_field($_POST['highlight_home']);

        // Nếu checkbox được chọn, thêm tag vào bài viết
        if ($checkbox_value === 'highlight_home') {
            wp_set_post_tags($post_id, 'highlight_home', true); // Thay 'custom_tag' bằng tag bạn muốn thêm
        }
    } else {
        wp_remove_object_terms($post_id, 'highlight_home', 'post_tag');
    }

    if (isset($_POST['highlight'])) {
        $checkbox_value = sanitize_text_field($_POST['highlight']);
        // Nếu checkbox được chọn, thêm tag vào bài viết
        if ($checkbox_value === 'highlight') {
            wp_set_post_tags($post_id, 'highlight', true); // Thay 'custom_tag' bằng tag bạn muốn thêm
        }
    } else {
        // Nếu checkbox không được chọn, xóa tag khỏi bài viết
        wp_remove_object_terms($post_id, 'highlight', 'post_tag'); // Thay 'custom_tag' bằng tag bạn muốn xóa
    }
}
add_action('save_post', 'save_custom_meta_box_values');

function render_custom_meta_box_for_word_category($post)
{
    // Lấy giá trị hiện tại của trường tùy chỉnh nếu có
    $client_value = get_post_meta($post->ID, 'client', true);
    ?>
    <label for="client">Client</label>
    <input style="width: 100%" type="text" name="client" id="client" value="<?php echo esc_attr($client_value); ?>">
    <?php

    $heroVimeoId = get_post_meta($post->ID, 'hero_vimeo_id', true);
    ?>
    <label for="hero_vimeo_id">Vimeo video id (Video which is shown on the banner of the post)</label>
    <input style="width: 100%" type="text" name="hero_vimeo_id" id="hero_vimeo_id"
        value="<?php echo esc_attr($heroVimeoId); ?>">
    <?php

    ?>
    <div id="custom_meta_box_feature_image" class="postbox" style="margin-top: 20px;">
        <h2 class="hndle">Banner image</h2>
        <div class="inside">
            <div class="meta-box-item-content">
                <?php custom_feature_image_box($post); ?>
            </div>
        </div>
    </div>
    <?php

    $highlight = ''; // Khởi tạo biến $highlight để lưu giá trị checkbox
    $highlight_home = '';
    $tags = get_the_tags($post->ID);

    // Kiểm tra xem tag 'highlight_home' có trong danh sách các tag không
    if ($tags && is_array($tags)) {
        foreach ($tags as $tag) {
            if ($tag->slug === 'highlight') {
                $highlight = 'highlight';
            }
            if ($tag->slug === 'highlight_home') {
                $highlight_home = 'highlight_home';
            }
        }
    }

    ?>
    <fieldset>
        <div>
            <input type="checkbox" name="highlight_home" id="highlight_home" value="highlight_home"
                style="display: inline-block; vertical-align: middle;  margin: 0.1rem;" <?php checked($highlight_home, 'highlight_home') ?>>
            <label for="highlight_home" style="display: inline-block; vertical-align: middle;">Show first on
                Homepage</label>
        </div>
        <?php

        ?>
        </br>
        <div>
            <input type="checkbox" name="highlight" id="highlight" value="highlight"
                style="display: inline-block; vertical-align: middle;  margin: 0.1rem;" <?php checked($highlight, 'highlight'); ?>>
            <label for="highlight" style="display: inline-block; vertical-align: middle;">Show on Homepage</label>
        </div>
        <?php

        ?>
        <div id="custom_meta_box_back_thumbnail" class="postbox"
            style="margin-top: 20px; <?php echo ($highlight_home == 'highlight_home' ? 'display: block;' : 'display: none;'); ?>">
            <h2 class="hndle">Back thumbnail on Homepage</h2>
            <div class="inside">
                <div class="meta-box-item-content">
                    <?php custom_post_meta_box_func_1($post); ?>
                </div>
            </div>
        </div>
    </fieldset>
    <?php

    ?>
    <div id="custom_meta_box_front_thumbnail" class="postbox"
        style="margin-top: 20px; <?php echo ($highlight == 'highlight' ? 'display: block;' : 'display: none;'); ?>">
        <h2 class="hndle">Front thumbnail on Homepage</h2>
        <div class="inside">
            <div class="meta-box-item-content">
                <?php custom_postpage_meta_box_func_2($post); ?>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function ($) {
            $('#highlight_home, #highlight').change(function () {
                if (!$('#highlight_home').is(':checked') && !$('#highlight').is(':checked')) {
                    $('#custom_meta_box_back_thumbnail').hide();
                    $('#custom_meta_box_front_thumbnail').hide();
                } else {
                    $('#custom_meta_box_back_thumbnail').show();
                    $('#custom_meta_box_front_thumbnail').show();
                }
            });
            $('a[href="#category-pop"]').parent().hide();
        });
    </script>

    <?php
}

function custom_script_for_work()
{
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            // Kiểm tra khi trang được tải
            checkWorkCategory();
            checkNewsCategory();

            // Kiểm tra khi category thay đổi
            $('#category-22 input[type="checkbox"]').change(function () {
                checkWorkCategory();
            });

            $('#category-14 input[type="checkbox"]').change(function () {
                checkNewsCategory();
            });

            $("input[name='post_category\\[\\]']").on("change", function () {
                // Bỏ chọn tất cả các checkbox category trừ cái được chọn gần nhất
                $("input[name='post_category\\[\\]']").not(this).removeAttr("checked");

                checkWorkCategory();
                checkNewsCategory();
            });

            function checkWorkCategory() {
                // Kiểm tra xem category "work" có được chọn không
                let isWorkSelected = $('#category-all input[value="22"]:checked').length > 0;

                // Nếu category "work" được chọn, render meta box
                if (isWorkSelected) {
                    // Render meta box
                    $('#custom_meta_box_for_word_category').show();
                    $('#custom_editor_meta_box').show();
                } else {
                    // Ẩn meta box nếu không có category "work" được chọn
                    $('#custom_meta_box_for_word_category').hide();
                    $('#custom_editor_meta_box').hide();
                }
            }

            function checkNewsCategory() {
                // Kiểm tra xem category "news" có được chọn không
                let isNewsSelected = $('#category-all input[value="14"]:checked').length > 0;

                // Nếu category "news" được chọn, render meta box
                if (isNewsSelected) {
                    // Render meta box
                    $('#custom_meta_box_for_news_category').show();
                } else {
                    // Ẩn meta box nếu không có category "news" được chọn
                    $('#custom_meta_box_for_news_category').hide();
                }
            }
        });
    </script>
    <?php
}
add_action('admin_footer', 'custom_script_for_work');

function custom_post_meta_box_func_1($post)
{
    // Hiển thị nội dung của meta box
    $meta_keys = array('meta_box_back_field');

    foreach ($meta_keys as $meta_key) {
        $image_meta_val = get_post_meta($post->ID, $meta_key, true);
        ?>
        <div class="custom_postpage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');"
                src="<?php echo ($image_meta_val != '' ? wp_get_attachment_image_src($image_meta_val)[0] : ''); ?>"
                style="width:100%;cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>" alt="">
            <a class="addimage" style="cursor:pointer;" onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');">
                <?php _e('Set Back thumbnail', 'textdomain'); ?>
            </a><br>
            <a class="removeimage" style="cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>"
                onclick="custom_postpage_remove_image('<?php echo $meta_key; ?>');">
                <?php _e('Remove Back thumbnail', 'textdomain'); ?>
            </a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>"
                value="<?php echo $image_meta_val; ?>">
        </div>
    <?php } ?>
    <script>
        function custom_postpage_add_image(key) {

            var $wrapper = jQuery('#' + key + '_wrapper');

            custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
                title: '<?php _e('select image', 'textdomain'); ?>',
                button: {
                    text: '<?php _e('select image', 'textdomain'); ?>'
                },
                multiple: false
            });
            custom_postimage_uploader.on('select', function () {

                var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
                var img_url = attachment['url'];
                var img_id = attachment['id'];
                $wrapper.find('input#' + key).val(img_id);
                $wrapper.find('img').attr('src', img_url);
                $wrapper.find('img').show();
                $wrapper.find('a.removeimage').show();
            });
            custom_postimage_uploader.on('open', function () {
                var selection = custom_postimage_uploader.state().get('selection');
                var selected = $wrapper.find('input#' + key).val();
                if (selected) {
                    selection.add(wp.media.attachment(selected));
                }
            });
            custom_postimage_uploader.open();
            return false;
        }

        function custom_postpage_remove_image(key) {
            var $wrapper = jQuery('#' + key + '_wrapper');
            $wrapper.find('input#' + key).val('');
            $wrapper.find('img').hide();
            $wrapper.find('a.removeimage').hide();
            return false;
        }
    </script>
    <?php wp_nonce_field('custom_postpage_meta_box', 'custom_postpage_meta_box_nonce');
}


function custom_feature_image_box($post)
{
    $meta_keys = array('_thumbnail_id');

    foreach ($meta_keys as $meta_key) {
        $image_meta_val = get_post_thumbnail_id($post->ID);
        ?>
        <div class="custom_postpage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');"
                src="<?php echo ($image_meta_val != '' ? wp_get_attachment_image_src($image_meta_val)[0] : ''); ?>"
                style="width:100%;cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>" alt="">
            <a class="addimage" style="cursor:pointer;" onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');">
                <?php _e('Set Banner image', 'textdomain'); ?>
            </a><br>
            <a class="removeimage" style="cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>"
                onclick="custom_postpage_remove_image('<?php echo $meta_key; ?>');">
                <?php _e('Remove Banner image', 'textdomain'); ?>
            </a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>"
                value="<?php echo $image_meta_val; ?>">
        </div>
    <?php } ?>
    <script>
        function custom_postpage_add_image(key) {

            var $wrapper = jQuery('#' + key + '_wrapper');

            custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
                title: '<?php _e('select image', 'textdomain'); ?>',
                button: {
                    text: '<?php _e('select image', 'textdomain'); ?>'
                },
                multiple: false
            });
            custom_postimage_uploader.on('select', function () {

                var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
                var img_url = attachment['url'];
                var img_id = attachment['id'];
                $wrapper.find('input#' + key).val(img_id);
                $wrapper.find('img').attr('src', img_url);
                $wrapper.find('img').show();
                $wrapper.find('a.removeimage').show();
            });
            custom_postimage_uploader.on('open', function () {
                var selection = custom_postimage_uploader.state().get('selection');
                var selected = $wrapper.find('input#' + key).val();
                if (selected) {
                    selection.add(wp.media.attachment(selected));
                }
            });
            custom_postimage_uploader.open();
            return false;
        }

        function custom_postpage_remove_image(key) {
            var $wrapper = jQuery('#' + key + '_wrapper');
            $wrapper.find('input#' + key).val('');
            $wrapper.find('img').hide();
            $wrapper.find('a.removeimage').hide();
            return false;
        }
    </script>
    <?php wp_nonce_field('custom_postpage_meta_box', 'custom_postpage_meta_box_nonce');
}


function custom_postpage_meta_box_func_2($post)
{

    $meta_keys = array('meta_box_front_field');

    foreach ($meta_keys as $meta_key) {
        $image_meta_val = get_post_meta($post->ID, $meta_key, true);
        ?>
        <div class="custom_postpage_wrapper" id="<?php echo $meta_key; ?>_wrapper" style="margin-bottom:20px;">
            <img onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');"
                src="<?php echo ($image_meta_val != '' ? wp_get_attachment_image_src($image_meta_val)[0] : ''); ?>"
                style="width:100%;cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>" alt="">
            <a class="addimage" style="cursor:pointer;" onclick="custom_postpage_add_image('<?php echo $meta_key; ?>');">
                <?php _e('Set Front thumbnail', 'textdomain'); ?>
            </a><br>
            <a class="removeimage" style="cursor:pointer;display: <?php echo ($image_meta_val != '' ? 'block' : 'none'); ?>"
                onclick="custom_postpage_remove_image('<?php echo $meta_key; ?>');">
                <?php _e('Remove Front thumbnail', 'textdomain'); ?>
            </a>
            <input type="hidden" name="<?php echo $meta_key; ?>" id="<?php echo $meta_key; ?>"
                value="<?php echo $image_meta_val; ?>">
        </div>
    <?php } ?>
    <script>
        function custom_postpage_add_image(key) {

            var $wrapper = jQuery('#' + key + '_wrapper');

            custom_postimage_uploader = wp.media.frames.file_frame = wp.media({
                title: '<?php _e('select image', 'textdomain'); ?>',
                button: {
                    text: '<?php _e('select image', 'textdomain'); ?>'
                },
                multiple: false
            });
            custom_postimage_uploader.on('select', function () {

                var attachment = custom_postimage_uploader.state().get('selection').first().toJSON();
                var img_url = attachment['url'];
                var img_id = attachment['id'];
                $wrapper.find('input#' + key).val(img_id);
                $wrapper.find('img').attr('src', img_url);
                $wrapper.find('img').show();
                $wrapper.find('a.removeimage').show();
            });
            custom_postimage_uploader.on('open', function () {
                var selection = custom_postimage_uploader.state().get('selection');
                var selected = $wrapper.find('input#' + key).val();
                if (selected) {
                    selection.add(wp.media.attachment(selected));
                }
            });
            custom_postimage_uploader.open();
            return false;
        }

        function custom_postpage_remove_image(key) {
            var $wrapper = jQuery('#' + key + '_wrapper');
            $wrapper.find('input#' + key).val('');
            $wrapper.find('img').hide();
            $wrapper.find('a.removeimage').hide();
            return false;
        }
    </script>
    <?php wp_nonce_field('custom_postpage_meta_box', 'custom_postpage_meta_box_nonce');
}

function custom_postimage_meta_box_save($post_id)
{
    if (get_post_type($post_id) !== 'post') {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return 'You have no permission to edit this post';
    }

    if (isset($_POST['custom_postpage_meta_box_nonce']) && wp_verify_nonce($_POST['custom_postpage_meta_box_nonce'], 'custom_postpage_meta_box')) {
        $meta_keys = array('meta_box_back_field', 'meta_box_front_field', 'meta_box_section_thumbnail_field', '_thumbnail_id');
        foreach ($meta_keys as $meta_key) {
            if (isset($_POST[$meta_key]) && intval($_POST[$meta_key]) != '') {
                update_post_meta($post_id, $meta_key, intval($_POST[$meta_key]));
            } else {
                update_post_meta($post_id, $meta_key, '');
            }
        }
    }
}
add_action('save_post', 'custom_postimage_meta_box_save');