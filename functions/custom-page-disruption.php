<?php

/* START PAGE DISRUPTION */
function add_custom_meta_boxes()
{
    global $post;
    if (!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if ($pageTemplate == 'page-disruption.php') {
            add_meta_box('featured_image_meta_box', 'Banner, Title, Text and Video Disruption', 'render_featured_image_meta_box', 'page', 'normal', 'default');
            add_meta_box('methods_meta_box', 'Module Methods Disruption', 'render_content_methods_meta_box', 'page', 'normal', 'default');
            add_meta_box('about_meta_box', 'Module About Disruption', 'render_content_about_meta_box', 'page', 'normal', 'default');
        }
    }
}
add_action('add_meta_boxes', 'add_custom_meta_boxes');
/*Banner , Title , Text and Video */
function render_featured_image_meta_box($post)
{

    $featured_image_id = get_post_meta($post->ID, 'featured_image_id', true);
    $featured_image = wp_get_attachment_image_src($featured_image_id, 'medium');
    $custom_title_disruption = get_post_meta($post->ID, 'custom_title_disruption', true);
    $custom_text = get_post_meta($post->ID, 'custom_text', true);
    ?>
    <p>
        <label for="custom_title_disruption">
            <?php _e('Custom Title'); ?>
        </label><br />
        <input style="width: 100%;" name="custom_title_disruption" id="custom_title_disruption"
            value="<?php echo esc_attr($custom_title_disruption); ?>" />
    </p>
    <p>
        <label for="featured_image">
            <?php _e('Upload Featured Image'); ?>
        </label><br />
        <input type="hidden" name="featured_image_id" id="featured_image_id" value="<?php echo $featured_image_id; ?>" />
        <img id="featured_image" src="<?php echo $featured_image ? $featured_image[0] : ''; ?>" style="max-width: 100%;" />
        <button type="button" id="featured_image_button" class="button-secondary">
            <?php _e('Select Image'); ?>
        </button>
        <button type="button" id="featured_image_remove_button" class="button-secondary">
            <?php _e('Remove Image'); ?>
        </button>
    </p>
    <p>
        <label for="custom_text">
            <?php _e('Custom Text'); ?>
        </label><br />
        <textarea style="width: 100%;" name="custom_text" id="custom_text" rows="5"
            cols="50"><?php echo $custom_text; ?></textarea>
    </p>
    <p><b>The video will be taken from the settings on the home page in the "Home Slider => Slider Video Disruption Url"
            section.</b></p>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#featured_image_button').click(function () {
                var frame = wp.media({
                    title: 'Select or Upload Image',
                    multiple: false,
                    library: {
                        type: 'image'
                    },
                    button: {
                        text: 'Select'
                    }
                });

                frame.on('select', function () {
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#featured_image').attr('src', attachment.url);
                    $('#featured_image_id').val(attachment.id);
                });

                frame.open();
            });

            $('#featured_image_remove_button').click(function () {
                $('#featured_image').attr('src', '');
                $('#featured_image_id').val('');
            });
        });
    </script>
    <?php
}
/* Module Methods */
function render_content_methods_meta_box($post)
{
    $methods_title = get_post_meta($post->ID, 'methods_title', true);
    $methods_content = get_post_meta($post->ID, 'methods_content', true);
    $methods_video = get_post_meta($post->ID, 'methods_video', true);

    ?>
    <div><b>Content</b></div>
    <p>
        <label for="methods_content">
            Content Methods
        </label><br />
        <input style="width: 100%;" name="methods_content" id="methods_content"
            value="<?php echo esc_attr($methods_content); ?>" />
    </p>
    <div><b>Video</b></div>
    <p>
        <label for="methods_video">
            Video Methods (Video upload under 40MB)
        </label><br />
        <input style="width: 100%;" name="methods_video" id="methods_video"
            value="<?php echo esc_attr($methods_video); ?>" />
    </p>
    <?php
}
/* Module About */
function render_content_about_meta_box($post)
{
    $module_methods_id = get_post_meta($post->ID, 'about_meta_box', true);
    $title_about_video_disruption = get_post_meta($post->ID, 'title_about_video_disruption', true);
    $text_about_video_disruption = get_post_meta($post->ID, 'text_about_video_disruption', true);
    $about_video_disruption = get_post_meta($post->ID, 'about_video_disruption', true);
    ?>
    <div><b>Text and Video 1</b></div>
    <p>
        <label for="title_about_video_disruption">Title</label>
        <br><input style="width: 100%" type="text" name="title_about_video_disruption" id="title_about_video_disruption"
            value="<?php echo $title_about_video_disruption; ?>"></br>
    </p>
    <p>
        <label for="text_about_video_disruption">Text</label>
        <br><input style="width: 100%" type="text" name="text_about_video_disruption" id="text_about_video_disruption"
            value="<?php echo $text_about_video_disruption; ?>"></br>
    </p>
    <p>
        <label for="about_video_disruption">Video Methods (Video upload under 40MB)</label>
        <br><input style="width: 100%" type="text" name="about_video_disruption" id="about_video_disruption"
            value="<?php echo $about_video_disruption; ?>"></br>
    </p>
    <?php
    for ($i = 1; $i <= 4; $i++) {
        $featured_image_about_id = get_post_meta($post->ID, 'featured_image_about_id_' . $i, true);
        $featured_image_about = wp_get_attachment_image_src($featured_image_about_id, 'medium');
        $title_about_disruption = get_post_meta($post->ID, 'title_about_disruption' . $i, true);
        $text_about_disruption = get_post_meta($post->ID, 'text_about_disruption' . $i, true);
        ?>
        <div><b><?php printf(__('Text and Image %d'), $i); ?></b></div>
        <p>
            <label for="title_about_disruption<?php echo $i; ?>">Title</label>
            <br><input style="width: 100%" type="text" name="title_about_disruption<?php echo $i; ?>"
                id="title_about_disruption<?php echo $i; ?>" value="<?php echo $title_about_disruption; ?>"></br>
        </p>
        <p>
            <label for="text_about_disruption<?php echo $i; ?>">Text</label>
            <br><input style="width: 100%" type="text" name="text_about_disruption<?php echo $i; ?>"
                id="text_about_disruption<?php echo $i; ?>" value="<?php echo $text_about_disruption; ?>"></br>
        </p>
        <p>
            <label for="featured_image_about_<?php echo $i; ?>">
                Upload Image
            </label><br />
            <input type="hidden" name="featured_image_about_id_<?php echo $i; ?>" id="featured_image_about_<?php echo $i; ?>_id"
                value="<?php echo $featured_image_about_id; ?>" />
            <img id="featured_image_about_<?php echo $i; ?>"
                src="<?php echo $featured_image_about ? $featured_image_about[0] : ''; ?>" style="max-width: 100%;" />
            <button type="button" class="button-secondary featured_image_about_button"
                data-target="featured_image_about_<?php echo $i; ?>">
                <?php _e('Select Image'); ?>
            </button>
            <button type="button" class="button-secondary featured_image_about_remove_button"
                data-target="featured_image_about_<?php echo $i; ?>">
                <?php _e('Remove Image'); ?>
            </button>
        </p>
        <?php
    }
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.featured_image_about_button').click(function () {
                var target = $(this).data('target');
                var frame = wp.media({
                    title: 'Select or Upload Image',
                    multiple: false,
                    library: {
                        type: 'image'
                    },
                    button: {
                        text: 'Select'
                    }
                });

                frame.on('select', function () {
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#' + target).attr('src', attachment.url);
                    $('#' + target + '_id').val(attachment.id);
                });

                frame.open();
            });

            $('.featured_image_about_remove_button').click(function () {
                var target = $(this).data('target');
                $('#' + target).attr('src', '');
                $('#' + target + '_id').val('');
            });
        });
    </script>
    <?php
}
/* END PAGE DISRUPTION */