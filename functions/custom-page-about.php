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
    <p><b>The video will be taken from the settings on the home page in the "Home Slider => Slider Video About Url"
            section.</b></p>
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
    <div><b>Image Our Clients</b></div>
    <p><b>"The images will be taken from the content entry on the pages"</b></p>
    <?php
}
/* END PAGE ABOUT */