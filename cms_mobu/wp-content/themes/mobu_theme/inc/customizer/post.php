<?php

/**
 *  Post:
 *  Social
 */
$wp_customize->add_section(
    'sec_post_social',
    array(
        'title'            => __('Redes Sociais (single post)', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_news_section',
    )
);

// Field Repeater - Item
$wp_customize->add_setting('customizer_repeater_social_post', array(
    'sanitize_callback' => 'customizer_repeater_sanitize'
));
$wp_customize->add_control(new Customizer_Repeater($wp_customize, 'customizer_repeater_social_post', array(
    'label'     => esc_html__('Item', 'customizer-repeater'),
    'section'   => 'sec_post_social',
    'priority'  => 1,
    'customizer_repeater_image_control'     => true,
    'customizer_repeater_icon_control'      => true,
    'customizer_repeater_link_control'      => true,
    'customizer_repeater_title_control'     => false,
    'customizer_repeater_text_control'      => false,
    'customizer_repeater_subtitle_control'  => false,
    'customizer_repeater_shortcode_control' => false,
    'customizer_repeater_repeater_control'  => false
)));
