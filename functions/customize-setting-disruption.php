<?php
function customize_settings_disruption($wp_customize)
{
    // Thêm section mới cho Content "Home Disruption"
    $wp_customize->add_section(
        'home_disruption_section',
        array(
            'title' => 'Disruption Section', // Title của section
            'priority' => 30,
        )
    );
}
add_action('customize_register', 'customize_settings_disruption');

function customize_setting_disruption_title($wp_customize)
{
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_disruption_label_title',
            array(
                'label' => 'First Title', // Label cho phần tử label
                'section' => 'home_disruption_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );
    // Thêm thiết lập cho Content "Home Disruption"
    $wp_customize->add_setting(
        'home_disruption_first_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_first_title',
        array(
            'label' => '[EN]',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'home_disruption_first_title_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_disruption_first_title_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_setting_disruption_title');

function customize_setting_disruption_content($wp_customize)
{
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_disruption_label_content',
            array(
                'label' => 'First Content', // Label cho phần tử label
                'section' => 'home_disruption_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );
    // Thêm thiết lập cho Content "Home Disruption"
    $wp_customize->add_setting(
        'home_disruption_first_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_first_content',
        array(
            'label' => '[EN]',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'home_disruption_first_content_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_disruption_first_content_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_setting_disruption_content');

function customize_setting_disruption_link($wp_customize)
{
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_disruption_label_link',
            array(
                'label' => 'First Button Name', // Label cho phần tử label
                'section' => 'home_disruption_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );
    $wp_customize->add_setting(
        'home_disruption_first_link',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_first_link',
        array(
            'label' => '[EN]',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'home_disruption_first_link_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_disruption_first_link_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_setting_disruption_link');
function customize_setting_disruption_title_2nd($wp_customize)
{
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_disruption_label_title_2nd',
            array(
                'label' => 'Second Title', // Label cho phần tử label
                'section' => 'home_disruption_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );
    $wp_customize->add_setting(
        'home_disruption_second_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_second_title',
        array(
            'label' => '[EN]',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'home_disruption_second_title_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_disruption_second_title_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_setting_disruption_title_2nd');
function customize_setting_disruption_content_2nd($wp_customize)
{
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'home_disruption_label_coin_2nd',
            array(
                'label' => 'Second Content', // Label cho phần tử label
                'section' => 'home_disruption_section',
                'settings' => array(), // Để trống vì control này không liên quan đến setting cụ thể
                'type' => 'hidden', // Đặt kiểu là text để hiển thị như một label
            )
        )
    );
    $wp_customize->add_setting(
        'home_disruption_second_content',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_second_content',
        array(
            'label' => '[EN]',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'home_disruption_second_content_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'home_disruption_second_content_vi',
        array(
            'label' => '[VI]',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_setting_disruption_content_2nd');


