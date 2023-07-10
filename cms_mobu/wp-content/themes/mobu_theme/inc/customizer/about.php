<?php

/**
 *  About
 */
$wp_customize->add_panel('panel_about_page', array(
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Configurações da Sessão: O Que', 'mobu_theme'),
    'description'    => '',
));

/**
 *  Section:
 *  O Que
 */
$wp_customize->add_section(
    'sec_header_about',
    array(
        'title'            => __('Conteudo lateral', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_about_page',
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
        'section'            => 'sec_header_about',
        'type'                => 'text'
    )
);

// Field 1 - Text Box
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
        'section'            => 'sec_header_about',
        'type'                => 'textarea'
    )
);
