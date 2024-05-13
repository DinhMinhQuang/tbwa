<?php

function customize_field_side_identity($wp_customize)
{
    // Thêm thiết lập cho đoạn văn bản trên trang chủ
    $wp_customize->add_setting(
        'homepage_text_line_1',
        array(
            'default' => 'We Are',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Hiển thị control cho đoạn văn bản trên trang chủ
    $wp_customize->add_control(
        'homepage_text_line_1',
        array(
            'label' => 'Text on Banner Line 1',
            'section' => 'title_tagline', // Chọn phần của Customizer để hiển thị control
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'homepage_text_line_2',
        array(
            'default' => 'The',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'homepage_text_line_2',
        array(
            'label' => 'Text on Banner Line 2',
            'section' => 'title_tagline', // Chọn phần của Customizer để hiển thị control
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'homepage_text_line_3',
        array(
            'default' => 'Disruption®',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    $wp_customize->add_control(
        'homepage_text_line_3',
        array(
            'label' => 'Text on Banner Line 3',
            'section' => 'title_tagline', // Chọn phần của Customizer để hiển thị control
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'homepage_text_line_4',
        array(
            'default' => 'Company',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'homepage_text_line_4',
        array(
            'label' => 'Text on Banner Line 4',
            'section' => 'title_tagline', // Chọn phần của Customizer để hiển thị control
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_field_side_identity');