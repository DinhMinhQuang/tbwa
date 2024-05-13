<?php
function custom_extra_information($wp_customize)
{
    $wp_customize->add_panel(
        'extra_data_panel', // Đặt tên cho panel
        array(
            'title' => __('Contact & Address', 'theme'), // Tiêu đề của panel
            'priority' => 200, // Ưu tiên hiển thị
            'capability' => 'edit_theme_options', // Quyền cần thiết để truy cập vào panel
        )
    );
}
add_action('customize_register', 'custom_extra_information');

function customize_extra_business_inquiries($wp_customize)
{
    $wp_customize->add_section(
        'extra_data_business_inquiries',
        array(
            'title' => __('Business Inquiries ', 'textdomain'),
            'priority' => 200,
            'panel' => 'extra_data_panel'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'business_inquiries_first_title_label',
            array(
                'label' => 'First title',
                'section' => 'extra_data_business_inquiries',
                'settings' => array(),
                'type' => 'hidden'
            )
        )
    );
    $wp_customize->add_setting(
        'business_inquiries_first_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_first_title',
        array(
            'label' => __('[EN]', 'textdomain'),
            'section' => 'extra_data_business_inquiries',
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'business_inquiries_first_title_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_first_title_vi',
        array(
            'label' => __('[VI]', 'textdomain'),
            'section' => 'extra_data_business_inquiries',
            'type' => 'text',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'business_inquiries_first_name_label',
            array(
                'label' => 'First name',
                'section' => 'extra_data_business_inquiries',
                'settings' => array(),
                'type' => 'hidden'
            )
        )
    );

    $wp_customize->add_setting(
        'business_inquiries_first_name',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'business_inquiries_first_name',
        array(
            'label' => __('[EN]', 'textdomain'),
            'section' => 'extra_data_business_inquiries',
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'business_inquiries_first_name_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'business_inquiries_first_name_vi',
        array(
            'label' => __('[VI]', 'textdomain'),
            'section' => 'extra_data_business_inquiries',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'business_inquiries_first_email',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_first_email',
        array(
            'label' => __('First Email', 'textdomain'),
            'section' => 'extra_data_business_inquiries',
            'type' => 'text',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'business_inquiries_second_title_label',
            array(
                'label' => 'Second title',
                'section' => 'extra_data_business_inquiries',
                'settings' => array(),
                'type' => 'hidden'
            )
        )
    );
    $wp_customize->add_setting(
        'business_inquiries_second_title',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_second_title',
        array(
            'label' => __('[EN]', 'textdomain'),
            'section' => 'extra_data_business_inquiries',
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'business_inquiries_second_title_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_second_title_vi',
        array(
            'label' => __('[VI]', 'textdomain'),
            'section' => 'extra_data_business_inquiries',
            'type' => 'text',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'business_inquiries_second_name_label',
            array(
                'label' => 'Second name',
                'section' => 'extra_data_business_inquiries',
                'settings' => array(),
                'type' => 'hidden'
            )
        )
    );
    // Thêm Setting cho Content footer
    $wp_customize->add_setting(
        'business_inquiries_second_name',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_second_name',
        array(
            'label' => __('[EN]', 'textdomain'),
            'section' => 'extra_data_business_inquiries',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'business_inquiries_second_name_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_second_name_vi',
        array(
            'label' => __('[VI]', 'textdomain'),
            'section' => 'extra_data_business_inquiries',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'business_inquiries_second_email',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'business_inquiries_second_email',
        array(
            'label' => __('Second Email', 'textdomain'),
            'section' => 'extra_data_business_inquiries',
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_extra_business_inquiries');

function customize_extra_address($wp_customize)
{
    $wp_customize->add_section(
        'extra_data_address',
        array(
            'title' => __('Address', 'textdomain'),
            'priority' => 200,
            'panel' => 'extra_data_panel'
        )
    );
    $wp_customize->add_setting(
        'extra_data_name',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_name',
        array(
            'label' => __('Company Name', 'textdomain'),
            'section' => 'extra_data_address',
            'type' => 'text',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'business_inquiries_first_address_label',
            array(
                'label' => 'First Line Address',
                'section' => 'extra_data_address',
                'settings' => array(),
                'type' => 'hidden'
            )
        )
    );

    $wp_customize->add_setting(
        'extra_data_address_first_line',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'extra_data_address_first_line',
        array(
            'label' => '[EN]',
            'section' => 'extra_data_address', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'extra_data_address_first_line_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'extra_data_address_first_line_vi',
        array(
            'label' => '[VI]',
            'section' => 'extra_data_address', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'business_inquiries_second_address_label',
            array(
                'label' => 'Second Line Address',
                'section' => 'extra_data_address',
                'settings' => array(),
                'type' => 'hidden'
            )
        )
    );
    $wp_customize->add_setting(
        'extra_data_address_second_line',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'extra_data_address_second_line',
        array(
            'label' => '[EN]',
            'section' => 'extra_data_address', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'extra_data_address_second_line_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'extra_data_address_second_line_vi',
        array(
            'label' => '[VI]',
            'section' => 'extra_data_address', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'business_inquiries_thrd_address_label',
            array(
                'label' => 'Third Line Address',
                'section' => 'extra_data_address',
                'settings' => array(),
                'type' => 'hidden'
            )
        )
    );
    $wp_customize->add_setting(
        'extra_data_address_third_line',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'extra_data_address_third_line',
        array(
            'label' => '[EN]',
            'section' => 'extra_data_address', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_address_third_line_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'extra_data_address_third_line_vi',
        array(
            'label' => '[VI]',
            'section' => 'extra_data_address', // Chọn section mới
            'type' => 'text',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'business_inquiries_fourth_address_label',
            array(
                'label' => 'Fourth Line Address',
                'section' => 'extra_data_address',
                'settings' => array(),
                'type' => 'hidden'
            )
        )
    );
    $wp_customize->add_setting(
        'extra_data_address_fourth_line',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'extra_data_address_fourth_line',
        array(
            'label' => '[EN]',
            'section' => 'extra_data_address', // Chọn section mới
            'type' => 'text',
        )
    );
    $wp_customize->add_setting(
        'extra_data_address_fourth_line_vi',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm control cho Content "Home Disruption" và đặt trong section 'home_disruption_section'
    $wp_customize->add_control(
        'extra_data_address_fourth_line_vi',
        array(
            'label' => '[VI]',
            'section' => 'extra_data_address', // Chọn section mới
            'type' => 'text',
        )
    );

}
add_action('customize_register', 'customize_extra_address');

function customize_contact($wp_customize)
{
    $wp_customize->add_section(
        'extra_data_contact',
        array(
            'title' => __('Contact', 'textdomain'),
            'priority' => 200,
            'panel' => 'extra_data_panel'
        )
    );
    $wp_customize->add_setting(
        'extra_data_phone',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_phone',
        array(
            'label' => __('TBWA Phone Number', 'textdomain'),
            'section' => 'extra_data_contact',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_email',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_email',
        array(
            'label' => __('TBWA Email', 'textdomain'),
            'section' => 'extra_data_contact',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_facebook',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_facebook',
        array(
            'label' => __('Facebook Url', 'textdomain'),
            'section' => 'extra_data_contact',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_linkedin',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_linkedin',
        array(
            'label' => __('LinkedIn Url', 'textdomain'),
            'section' => 'extra_data_contact',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'extra_data_instagram',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Thêm Control cho Content footer
    $wp_customize->add_control(
        'extra_data_instagram',
        array(
            'label' => __('Instagram Url', 'textdomain'),
            'section' => 'extra_data_contact',
            'type' => 'text',
        )
    );
}
add_action('customize_register', 'customize_contact');
