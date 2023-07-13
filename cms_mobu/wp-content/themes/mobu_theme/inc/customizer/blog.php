<?php

/**
 *  Blog
 */
$wp_customize->add_panel('panel_news_section', array(
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Sessão: News', 'mobu_theme'),
    'description'    => '',
));

/**
 *  Conteudo
 */
$wp_customize->add_section(
    'sec_lateral_news',
    array(
        'title'            => __('Conteudo', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_news_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_news',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_news',
    array(
        'label'                => __('Titulo da sessão', 'mobu_theme'),
        'description'        => __('Digite o titulo da sessão', 'mobu_theme'),
        'section'            => 'sec_lateral_news',
        'type'                => 'text'
    )
);

// Field 2 - Text Box
$wp_customize->add_setting(
    'set_subtitle_news',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_subtitle_news',
    array(
        'label'                => __('Subtitulo da sessão', 'mobu_theme'),
        'description'        => __('Digite o subtitulo da sessão', 'mobu_theme'),
        'section'            => 'sec_lateral_news',
        'type'                => 'textarea'
    )
);
