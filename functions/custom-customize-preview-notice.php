<?php
function custom_customize_preview_notice($notice)
{
    $notice = str_replace('You are customizing', 'You are customizing your home page', $notice);
    return $notice;
}
add_filter('gettext', 'custom_customize_preview_notice');