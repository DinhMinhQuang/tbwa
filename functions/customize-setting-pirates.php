<?php
function customize_settings_title($wp_customize)
{
    // Thêm section mới cho Content "Home Disruption"
    $wp_customize->add_section(
        'home_pirates_section',
        array(
            'title' => 'Pirates Section', // Title của section
            'priority' => 32,
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_pirates_label_title',
            array(
                'label' => 'Title', // Label cho phần tử label
                'section' => 'home_pirates_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );

    $wp_customize->add_setting(
        'home_pirates_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_pirates_title',
        array(
            'label' => '[EN]',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'home_pirates_title_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_pirates_title_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'text',
        )
    );

}
add_action('customize_register', 'customize_settings_title');

function customize_settings_content($wp_customize)
{
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_pirates_label_content1',
            array(
                'label' => 'Content', // Label cho phần tử label
                'section' => 'home_pirates_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );
    $wp_customize->add_setting(
        'home_pirates_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_pirates_content',
        array(
            'label' => '[EN]',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'home_pirates_content_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_pirates_content_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_settings_content');

function customize_settings_button_pirates($wp_customize)
{
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_pirates_label_content',
            array(
                'label' => 'Button Name', // Label cho phần tử label
                'section' => 'home_pirates_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );

    $wp_customize->add_setting(
        'home_pirates_link',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_pirates_link',
        array(
            'label' => '[EN]',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'home_pirates_link_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_pirates_link_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_pirates_section', // Chọn section mới
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_settings_button_pirates');



function customize_settings_pirates_vi($wp_customize)
{
    $wp_customize->add_setting(
        'home_pirates_banner',
        array(
            'default' => '',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'home_pirates_banner_control',
            array(
                'label' => __('Pirates Banner', 'theme'),
                'section' => 'home_pirates_section', // Customize this section according to your needs
                'settings' => 'home_pirates_banner',
            )
        )
    );
}
add_action('customize_register', 'customize_settings_pirates_vi');
