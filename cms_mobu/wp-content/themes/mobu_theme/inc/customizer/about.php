<?php

/**
 *  About
 */
$wp_customize->add_panel('panel_about_section', array(
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Configurações da Sessão: O Que', 'mobu_theme'),
    'description'    => '',
));

/**
 *  Section:
 *  O Que (lateral)
 */
$wp_customize->add_section(
    'sec_lateral_about',
    array(
        'title'            => __('Conteudo lateral', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_about_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_about',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_about',
    array(
        'label'                => __('Titulo da sessão', 'mobu_theme'),
        'description'        => __('Digite o titulo da sessão', 'mobu_theme'),
        'section'            => 'sec_lateral_about',
        'type'                => 'text'
    )
);

// Field 2 - Text Box
$wp_customize->add_setting(
    'set_text_about',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_text_about',
    array(
        'label'                => __('Texto da sessão', 'mobu_theme'),
        'description'        => __('Digite o titulo da sessão', 'mobu_theme'),
        'section'            => 'sec_lateral_about',
        'type'                => 'textarea'
    )
);

/**
 *  Section:
 *  O Que (Principal)
 */
$wp_customize->add_section(
    'sec_principal_about',
    array(
        'title'            => __('Conteudo principal', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_about_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_services_about',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_services_about',
    array(
        'label'                => __('Titulo', 'mobu_theme'),
        'description'        => __('Digite o titulo', 'mobu_theme'),
        'section'            => 'sec_principal_about',
        'type'                => 'text'
    )
);


/**
 *
 *  Contact Page:
 *  Social
 *
 */
$wp_customize->add_section(
    'sec_social_about',
    array(
        'title'            => __('Serviços', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_about_section',
    )
);

// Field Repeater - Item
$wp_customize->add_setting('customizer_repeater_services', array(
    'sanitize_callback' => 'customizer_repeater_sanitize'
));
$wp_customize->add_control(new Customizer_Repeater($wp_customize, 'customizer_repeater_services', array(
    'label'     => esc_html__('Item', 'customizer-repeater'),
    'section'   => 'sec_social_about',
    'priority'  => 1,
    'customizer_repeater_icon_control'      => true,
    'customizer_repeater_image_control'     => true,
    'customizer_repeater_title_control'     => true,
    'customizer_repeater_text_control'      => true,
    'customizer_repeater_link_control'      => false,
    'customizer_repeater_subtitle_control'  => false,
    'customizer_repeater_shortcode_control' => false,
    'customizer_repeater_repeater_control'  => false
)));
