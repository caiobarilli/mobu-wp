<?php

/**
 *  Testimonials / Clientes
 */
$wp_customize->add_panel('panel_testimonial_section', array(
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Configurações da Sessão: Depoimento/Clientes', 'mobu_theme'),
    'description'    => '',
));

/**
 * Testimonials slider
 */
$wp_customize->add_section(
    'sec_testimonial_client',
    array(
        'title'            => __('Depoimentos', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_testimonial_section',
    )
);

// Field Repeater - Item
$wp_customize->add_setting('customizer_repeater_depoimentos', array(
    'sanitize_callback' => 'customizer_repeater_sanitize'
));
$wp_customize->add_control(new Customizer_Repeater($wp_customize, 'customizer_repeater_depoimentos', array(
    'label'     => esc_html__('Item', 'customizer-repeater'),
    'section'   => 'sec_testimonial_client',
    'priority'  => 1,
    'customizer_repeater_icon_control'      => true,
    'customizer_repeater_image_control'     => true,
    'customizer_repeater_title_control'     => true,
    'customizer_repeater_text_control'      => true,
    'customizer_repeater_subtitle_control'  => true,
    'customizer_repeater_link_control'      => false,
    'customizer_repeater_shortcode_control' => false,
    'customizer_repeater_repeater_control'  => false
)));


/**
 * Clientes
 */
$wp_customize->add_section(
    'sec_clients_testimonial',
    array(
        'title'            => __('Clientes', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_testimonial_section',
    )
);

// Field Repeater - Item
$wp_customize->add_setting('customizer_repeater_clients', array(
    'sanitize_callback' => 'customizer_repeater_sanitize'
));
$wp_customize->add_control(new Customizer_Repeater($wp_customize, 'customizer_repeater_clients', array(
    'label'     => esc_html__('Item', 'customizer-repeater'),
    'section'   => 'sec_clients_testimonial',
    'priority'  => 1,
    'customizer_repeater_icon_control'      => true,
    'customizer_repeater_image_control'     => true,
    'customizer_repeater_title_control'     => false,
    'customizer_repeater_text_control'      => false,
    'customizer_repeater_link_control'      => false,
    'customizer_repeater_subtitle_control'  => false,
    'customizer_repeater_shortcode_control' => false,
    'customizer_repeater_repeater_control'  => false
)));
