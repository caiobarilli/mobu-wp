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

// Field 2 - Text Box
$wp_customize->add_setting(
    'set_subtitle_module_i',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_subtitle_module_i',
    array(
        'label'                => __('Subtitulo', 'mobu_theme'),
        'description'        => __('Digite o subtitulo do modulo I', 'mobu_theme'),
        'section'            => 'sec_modules_i',
        'type'                => 'text'
    )
);

// Field 3 - Text Box
$wp_customize->add_setting(
    'set_price_module_i',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_price_module_i',
    array(
        'label'                => __('Preço', 'mobu_theme'),
        'description'        => __('Digite o preço do modulo I', 'mobu_theme'),
        'section'            => 'sec_modules_i',
        'type'                => 'text'
    )
);

// Field 4 - Text Box
$wp_customize->add_setting(
    'set_text_module_i',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_text_module_i',
    array(
        'label'                => __('Texto', 'mobu_theme'),
        'description'        => __('Digite o texto do modulo I', 'mobu_theme'),
        'section'            => 'sec_modules_i',
        'type'                => 'textarea'
    )
);

// Field 5 - Text Box
$wp_customize->add_setting(
    'set_link_module_i',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_link_module_i',
    array(
        'label'                => __('Link', 'mobu_theme'),
        'description'        => __('Digite o link do botão para modulo I', 'mobu_theme'),
        'section'            => 'sec_modules_i',
        'type'                => 'url'
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

// Field 2 - Text Box
$wp_customize->add_setting(
    'set_subtitle_module_ii',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_subtitle_module_ii',
    array(
        'label'                => __('Subtitulo', 'mobu_theme'),
        'description'        => __('Digite o subtitulo do modulo II', 'mobu_theme'),
        'section'            => 'sec_modules_ii',
        'type'                => 'text'
    )
);

// Field 3 - Text Box
$wp_customize->add_setting(
    'set_price_module_ii',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_price_module_ii',
    array(
        'label'                => __('Preço', 'mobu_theme'),
        'description'        => __('Digite o preço do modulo II', 'mobu_theme'),
        'section'            => 'sec_modules_ii',
        'type'                => 'text'
    )
);

// Field 4 - Text Box
$wp_customize->add_setting(
    'set_text_module_ii',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_text_module_ii',
    array(
        'label'                => __('Texto', 'mobu_theme'),
        'description'        => __('Digite o texto do modulo II', 'mobu_theme'),
        'section'            => 'sec_modules_ii',
        'type'                => 'textarea'
    )
);

// Field 5 - Text Box
$wp_customize->add_setting(
    'set_link_module_ii',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_link_module_ii',
    array(
        'label'                => __('Link', 'mobu_theme'),
        'description'        => __('Digite o link do botão para modulo II', 'mobu_theme'),
        'section'            => 'sec_modules_ii',
        'type'                => 'url'
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

// Field 2 - Text Box
$wp_customize->add_setting(
    'set_subtitle_module_iii',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_subtitle_module_iii',
    array(
        'label'                => __('Subtitulo', 'mobu_theme'),
        'description'        => __('Digite o subtitulo do modulo III', 'mobu_theme'),
        'section'            => 'sec_modules_iii',
        'type'                => 'text'
    )
);

// Field 3 - Text Box
$wp_customize->add_setting(
    'set_price_module_iii',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_price_module_iii',
    array(
        'label'                => __('Preço', 'mobu_theme'),
        'description'        => __('Digite o preço do modulo III', 'mobu_theme'),
        'section'            => 'sec_modules_iii',
        'type'                => 'text'
    )
);

// Field 4 - Text Box
$wp_customize->add_setting(
    'set_text_module_iii',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_text_module_iii',
    array(
        'label'                => __('Texto', 'mobu_theme'),
        'description'        => __('Digite o texto do modulo III', 'mobu_theme'),
        'section'            => 'sec_modules_iii',
        'type'                => 'textarea'
    )
);

// Field 5 - Text Box
$wp_customize->add_setting(
    'set_link_module_iii',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_link_module_iii',
    array(
        'label'                => __('Link', 'mobu_theme'),
        'description'        => __('Digite o link do botão para modulo III', 'mobu_theme'),
        'section'            => 'sec_modules_iii',
        'type'                => 'url'
    )
);

$wp_customize->add_section(
    'sec_modules_others',
    array(
        'title'            => __('Outros Modulos', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_modules_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_module_others',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_module_others',
    array(
        'label'                => __('Titulo', 'mobu_theme'),
        'description'        => __('Digite o titulo do modulo (geral)', 'mobu_theme'),
        'section'            => 'sec_modules_others',
        'type'                => 'textarea'
    )
);

// Field 2 - Text Box
$wp_customize->add_setting(
    'set_link_module_others',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_link_module_others',
    array(
        'label'                => __('Link', 'mobu_theme'),
        'description'        => __('Digite o link do botão para (geral)', 'mobu_theme'),
        'section'            => 'sec_modules_others',
        'type'                => 'url'
    )
);
