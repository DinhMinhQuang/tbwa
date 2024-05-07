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
            'label' => 'First Title',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );

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
            'label' => 'First Content',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
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
            'label' => 'First Button Name',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
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
            'label' => 'Second Title',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
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
            'label' => 'Second Content',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );

    // Control cho content thứ 2 
    $wp_customize->add_setting(
        'home_disruption_second_link',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'home_disruption_second_link',
        array(
            'label' => 'Second Link',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );

}
add_action('customize_register', 'customize_settings_disruption');

// sử dụng các field cho ngôn ngữ tiếng việt
function customize_setting_disruption_vi($wp_customize)
{
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
            'label' => 'First Title Vietnamese',
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
            'label' => 'First Content Vietnamese',
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
            'label' => 'First Button Name Vietnamese',
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
            'label' => 'Second Title Vietnamese',
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
            'label' => 'Second Content Vietnamese',
            'section' => 'home_disruption_section', // Chọn section mới
            'type' => 'text',
        )
    );

}

add_action('customize_register', 'customize_setting_disruption_vi');

