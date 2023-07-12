<?php

/**
 *
 *  Time
 *
 */
$wp_customize->add_panel('panel_team_section', array(
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Sessão: Time', 'mobu_theme'),
    'description'    => '',
));

/**
 *  Conteudo
 */
$wp_customize->add_section(
    'sec_header_team',
    array(
        'title'         => __('Conteudos (textos)', 'mobu_theme'),
        'description'   => ' ',
        'panel'         => 'panel_team_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_team',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_team',
    array(
        'label'         => __('Titulo', 'mobu_theme'),
        'description'   => __('Digite o titulo da sessão', 'mobu_theme'),
        'section'       => 'sec_header_team',
        'type'          => 'text'
    )
);

// Field 2 - Text Box
$wp_customize->add_setting(
    'set_text_team',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_text_team',
    array(
        'label'         => __('Texto', 'mobu_theme'),
        'description'   => __('Digite o texto da sessão', 'mobu_theme'),
        'section'       => 'sec_header_team',
        'type'          => 'textarea'
    )
);
