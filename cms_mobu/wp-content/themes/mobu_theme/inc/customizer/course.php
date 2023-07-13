<?php

/**
 *
 *  Curso
 *
 */
$wp_customize->add_panel('panel_course_section', array(
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Sessão: Curso', 'mobu_theme'),
    'description'    => '',
));

/**
 *  Titulo
 */
$wp_customize->add_section(
    'sec_header_course',
    array(
        'title'            => __('Conteudo (textos)', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_course_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_course',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_course',
    array(
        'label'                => __('Titulo', 'mobu_theme'),
        'description'        => __('Digite o titulo da sessão', 'mobu_theme'),
        'section'            => 'sec_header_course',
        'type'                => 'text'
    )
);
