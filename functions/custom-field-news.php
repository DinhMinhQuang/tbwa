<?php
function render_custom_meta_box_for_news_category($post)
{
    $location = get_post_meta($post->ID, 'location', true);
    ?>
    <label for="location">Choose your location</label>
    <input style="width: 100%" type="text" name="location" id="location" value="<?php echo esc_attr($location); ?>">
    <?php

    $redirectUrl = get_post_meta($post->ID, 'redirectUrl', true);
    ?>
    <label for="redirectUrl">Direct URL (if any)</label>
    <input style="width: 100%" type="text" name="redirectUrl" id="redirectUrl"
        value="<?php echo esc_attr($redirectUrl); ?>">
    <?php
}