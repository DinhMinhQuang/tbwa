<?php

/* START PAGE ABOUT */
function add_custom_page_about_meta_boxes()
{
    global $post;
    if (!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if ($pageTemplate == 'page-about.php') {
            add_meta_box('featured_image_about_meta_box', 'Title and Video About', 'render_page_about_img_featured_meta_box', 'page', 'normal', 'default');
            add_meta_box('company_about_meta_box', 'Module Company About', 'render_content_company_about_meta_box', 'page', 'normal', 'default');
            add_meta_box('our_clients_meta_box', 'Module Our Clients', 'render_content_our_clients_meta_box', 'page', 'normal', 'default');
			add_meta_box('worldwide_meta_box', 'Module Worldwide', 'render_content_worldwide_about_meta_box', 'page', 'normal', 'default');
        }
    }
}
add_action('add_meta_boxes', 'add_custom_page_about_meta_boxes');
function render_page_about_img_featured_meta_box($post)
{
    /* Title and Video About */
    $featured_image_id = get_post_meta($post->ID, 'featured_image_bout_id', true);
    $about__title = get_post_meta($post->ID, 'about__title', true);
    ?>
    <p>
        <label for="about__title">
            Title (Use '#####' to drop rows from header)
        </label><br />
        <input style="width: 100%;" name="about__title" id="about__title" value="<?php echo esc_attr($about__title); ?>" />
    </p>
    <p><b>To change the video on banner: <br />
            Customize Homepage => Banner videos => Video Url - Our Culture</b></p>
    <?php
}
/* Module Company */
function render_content_company_about_meta_box($post)
{
    $module_methods_id = get_post_meta($post->ID, 'company_about_meta_box', true);
    $company_about_title = get_post_meta($post->ID, 'company_about_title', true);
    $company_about_content = get_post_meta($post->ID, 'company_about_content', true);
    ?>
    <div><b>Title</b></div>
    <p>
        <label for="company_about_title">
            Title Company
        </label><br />
        <input type="text" style="width: 100%;" name="company_about_title" id="company_about_title"
            value="<?php echo wp_kses_post($company_about_title); ?>" />
    </p>
    <div><b>Content</b></div>
    <p>
        <label for="company_about_content">
            Content Company
        </label><br />
        <textarea style="width: 100%;" name="company_about_content" id="company_about_content" rows="5"
            cols="50"><?php echo esc_html($company_about_content); ?></textarea>
    </p>
    <?php
}
function render_content_our_clients_meta_box($post)
{
    $our_clients_title = get_post_meta($post->ID, 'our_clients_title', true);
    ?>
    <div><b>Title</b></div>
    <p>
        <label for="our_clients_title">
            Title Our Clients
        </label><br />
        <input type="text" style="width: 100%;" name="our_clients_title" id="our_clients_title"
            value="<?php echo htmlspecialchars($our_clients_title); ?>" />
    </p>
    <div><b>Clients' logo</b></div>
    <p><b>“The logos will be taken from the content entry on the page”</b></p>
    <?php
}
function render_content_worldwide_about_meta_box($post)
{
    $worldwide_about_title = get_post_meta($post->ID, 'worldwide_about_title', true);
    $worldwide_about_link = get_post_meta($post->ID, 'worldwide_about_link', true);
    $worldwide_about_content = get_post_meta($post->ID, 'worldwide_about_content', true);
    $worldwide_about_logo_id = get_post_meta($post->ID, 'worldwide_about_logo_id', true);
    $worldwide_about_logo_image = wp_get_attachment_image_src($worldwide_about_logo_id, 'medium');
    ?>
    <div><b>Title:</b></div>
    <p>
        <label for="worldwide_about_title">
            Title
        </label><br />
        <input type="text" style="width: 100%;" name="worldwide_about_title" id="worldwide_about_title"
            value="<?php echo htmlspecialchars($worldwide_about_title); ?>" />
    </p>
    <div><b>Logo:</b></div>
    <p>
        <label for="featured_image">
            <?php _e('Upload Featured Image'); ?>
        </label><br />
        <input type="hidden" name="worldwide_about_logo_id" id="worldwide_about_logo_id"
            value="<?php echo $worldwide_about_logo_id; ?>" />
        <img id="worldwide_about_logo_image"
            src="<?php echo $worldwide_about_logo_image ? $worldwide_about_logo_image[0] : ''; ?>"
            style="max-width: 100%;" />
        <button type="button" id="worldwide_about_logo_button" class="button-secondary">
            <?php _e('Select Image'); ?>
        </button>
        <button type="button" id="worldwide_about_logo_remove_button" class="button-secondary">
            <?php _e('Remove Image'); ?>
        </button>
    </p>
    <div><b>Logo hyperlink:</b></div>
    <p>
        <label for="worldwide_about_title">
            Url
        </label><br />
        <input type="text" style="width: 100%;" name="worldwide_about_link" id="worldwide_about_link"
            value="<?php echo htmlspecialchars($worldwide_about_link); ?>" />
    </p>
    <div><b>Content:</b></div>
    <p>
        <label for="worldwide_about_content">
            Content
        </label><br />
        <textarea style="width: 100%;" name="worldwide_about_content" id="worldwide_about_content" rows="5"
            cols="50"><?php echo $worldwide_about_content; ?></textarea>
    </p>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#worldwide_about_logo_button').click(function () {
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
                    $('#worldwide_about_logo_image').attr('src', attachment.url);
                    $('#worldwide_about_logo_id').val(attachment.id);
                });

                frame.open();
            });

            $('#worldwide_about_logo_remove_button').click(function () {
                $('#worldwide_about_logo_image').attr('src', '');
                $('#worldwide_about_logo_id').val('');
            });
        });
    </script>
    <?php
}
/* END PAGE ABOUT */