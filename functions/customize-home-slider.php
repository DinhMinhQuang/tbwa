<?php
function home_slider_customize($wp_customize)
{
    $wp_customize->add_panel(
        'slider_video_panel', // Đặt tên cho panel
        array(
            'title' => __('Banner Videos', 'theme'), // Tiêu đề của panel
            'priority' => 30, // Ưu tiên hiển thị
            'capability' => 'edit_theme_options', // Quyền cần thiết để truy cập vào panel
        )
    );
    $wp_customize->add_section(
        'slider_video_section',
        array(
            'title' => __('Banner Video', 'theme'),
            'capability' => 'edit_theme_options',
            'priority' => 20,
            'panel' => 'slider_video_panel',
        )
    );

    $wp_customize->add_setting(
        'banner_video',
        array(
            'default' => '',
            'sanitize_callback' => 'absint',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'banner_video_control',
            array(
                'label' => __('Banner Video', 'theme'),
                'section' => 'slider_video_section',
                'type' => 'media',
                'settings' => 'banner_video',
            )
        )
    );
}
add_action('customize_register', 'home_slider_customize');

function customize_culture($wp_customize)
{
    $wp_customize->add_section(
        'culture_section',
        array(
            'title' => __('Our Culture', 'theme'),
            'priority' => 20,
            'panel' => 'slider_video_panel',
        )
    );
    $wp_customize->add_setting(
        'slider_video_culture_url',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_culture_url',
        array(
            'label' => 'Video Url',
            'section' => 'culture_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_culture_button',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_culture_button',
        array(
            'label' => '[EN] Button Name',
            'section' => 'culture_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_culture_button_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_culture_button_vi',
        array(
            'label' => '[VI] Button Name',
            'section' => 'culture_section',
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_culture');

function customize_disruption($wp_customize)
{
    $wp_customize->add_section(
        'disruption_section',
        array(
            'title' => __('Disruption', 'theme'),
            'priority' => 20,
            'panel' => 'slider_video_panel',
        )
    );
    $wp_customize->add_setting(
        'slider_video_disruption_url',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_disruption_url',
        array(
            'label' => 'Video Url',
            'section' => 'disruption_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_disruption_button',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_disruption_button',
        array(
            'label' => '[EN] Button name',
            'section' => 'disruption_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_disruption_button_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_disruption_button_vi',
        array(
            'label' => '[VI] Button name',
            'section' => 'disruption_section',
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_disruption');

function customize_software($wp_customize)
{
    $wp_customize->add_section(
        'software_section',
        array(
            'title' => __('Our Software', 'theme'),
            'priority' => 20,
            'panel' => 'slider_video_panel',
        )
    );
    $wp_customize->add_setting(
        'slider_video_software_url',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_software_url',
        array(
            'label' => 'Video Url',
            'section' => 'software_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_software_button',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_software_button',
        array(
            'label' => '[EN] Button Name',
            'section' => 'software_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_software_button_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_software_button_vi',
        array(
            'label' => '[VI] Button Name',
            'section' => 'software_section',
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_software');
function customize_work($wp_customize)
{
    $wp_customize->add_section(
        'work_section',
        array(
            'title' => __('Our Work', 'theme'),
            'priority' => 20,
            'panel' => 'slider_video_panel',
        )
    );
    $wp_customize->add_setting(
        'slider_video_work_url',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_work_url',
        array(
            'label' => 'Video Url',
            'section' => 'work_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_work_button',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_work_button',
        array(
            'label' => '[EN] Button name',
            'section' => 'work_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_work_button_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_work_button_vi',
        array(
            'label' => '[VI] Button Name',
            'section' => 'work_section',
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_work');

function customize_pirates($wp_customize)
{
    $wp_customize->add_section(
        'pirates_section',
        array(
            'title' => __('Pirates', 'theme'),
            'priority' => 20,
            'panel' => 'slider_video_panel',
        )
    );
    $wp_customize->add_setting(
        'slider_video_pirate_url',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_pirate_url',
        array(
            'label' => 'Video Url',
            'section' => 'pirates_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_pirate_button',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_pirate_button',
        array(
            'label' => '[EN] Button Name',
            'section' => 'pirates_section',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'slider_video_pirate_button_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'slider_video_pirate_button_vi',
        array(
            'label' => '[VI] Button Name',
            'section' => 'pirates_section',
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_pirates');




