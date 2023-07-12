<?php

/**
 *
 *  Modulos
 *
 */
$wp_customize->add_panel('panel_modules_section', array(
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Sessão: Modulos', 'mobu_theme'),
    'description'    => '',
));

/**
 *  Titulo
 */
$wp_customize->add_section(
    'sec_header_modules',
    array(
        'title'            => __('Titulo', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_modules_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_modules',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_modules',
    array(
        'label'                => __('Titulo', 'mobu_theme'),
        'description'        => __('Digite o titulo da sessão', 'mobu_theme'),
        'section'            => 'sec_header_modules',
        'type'                => 'textarea'
    )
);

/**
 *  Modulos
 */
$wp_customize->add_section(
    'sec_modules_i',
    array(
        'title'            => __('Modulo I', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_modules_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_module_i',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_module_i',
    array(
        'label'                => __('Titulo', 'mobu_theme'),
        'description'        => __('Digite o titulo do modulo I', 'mobu_theme'),
        'section'            => 'sec_modules_i',
        'type'                => 'text'
    )
);

$wp_customize->add_section(
    'sec_modules_ii',
    array(
        'title'            => __('Modulo II', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_modules_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_module_ii',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_module_ii',
    array(
        'label'                => __('Titulo', 'mobu_theme'),
        'description'        => __('Digite o titulo do modulo II', 'mobu_theme'),
        'section'            => 'sec_modules_ii',
        'type'                => 'text'
    )
);

$wp_customize->add_section(
    'sec_modules_iii',
    array(
        'title'            => __('Modulo III', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_modules_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_module_iii',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_module_iii',
    array(
        'label'                => __('Titulo', 'mobu_theme'),
        'description'        => __('Digite o titulo do modulo III', 'mobu_theme'),
        'section'            => 'sec_modules_iii',
        'type'                => 'text'
    )
);

$wp_customize->add_section(
    'sec_modules_outhers',
    array(
        'title'            => __('Outros Modulos', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_modules_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_module_outhers',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_module_outhers',
    array(
        'label'                => __('Titulo', 'mobu_theme'),
        'description'        => __('Digite o titulo do modulo (geral)', 'mobu_theme'),
        'section'            => 'sec_modules_outhers',
        'type'                => 'text'
    )
);
