<?php
function customize_settings_work($wp_customize)
{
    $wp_customize->add_section(
        'home_work_section',
        array(
            'title' => 'Work Section', // Title của section
            'priority' => 31,
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_work_label_title',
            array(
                'label' => 'Title', // Label cho phần tử label
                'section' => 'home_work_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );

    // Thêm thiết lập cho Content "Home Disruption"
    $wp_customize->add_setting(
        'home_work_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_work_title',
        array(
            'label' => '[EN]',
            'section' => 'home_work_section', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'home_work_title_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_pirates_section'
    $wp_customize->add_control(
        'home_work_title_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_work_section', // Chọn section mới
            'type' => 'text',
        )
    );

}
add_action('customize_register', 'customize_settings_work');

function customize_settings_work_vi($wp_customize)
{
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_work_label_content',
            array(
                'label' => 'Content', // Label cho phần tử label
                'section' => 'home_work_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );


    $wp_customize->add_setting(
        'home_work_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_work_content',
        array(
            'label' => '[EN]',
            'section' => 'home_work_section', // Chọn section mới
            'type' => 'text',
        )
    );

    // Thêm thiết lập cho Content "Home Disruption"
    $wp_customize->add_setting(
        'home_work_content_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_pirates_section'
    $wp_customize->add_control(
        'home_work_content_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_work_section', // Chọn section mới
            'type' => 'text',
        )
    );

}
add_action('customize_register', 'customize_settings_work_vi');

function customize_settings_button($wp_customize)
{
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_work_label_button',
            array(
                'label' => 'Button Name', // Label cho phần tử label
                'section' => 'home_work_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );


    $wp_customize->add_setting(
        'home_work_button_name',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_work_button_name',
        array(
            'label' => '[EN]',
            'section' => 'home_work_section', // Chọn section mới
            'type' => 'text',
        )
    );

    // Thêm thiết lập cho Content "Home Disruption"
    $wp_customize->add_setting(
        'home_work_button_name_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_pirates_section'
    $wp_customize->add_control(
        'home_work_button_name_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_work_section', // Chọn section mới
            'type' => 'text',
        )
    );

}
add_action('customize_register', 'customize_settings_button');