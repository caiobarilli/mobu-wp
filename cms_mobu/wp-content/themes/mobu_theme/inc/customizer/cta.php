<?php

/**
 *
 *  CTA
 *
 */
$wp_customize->add_panel('panel_cta_section', array(
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Sessão: Para Quem?', 'mobu_theme'),
    'description'    => '',
));

/**
 *  Conteudo principal
 */
$wp_customize->add_section(
    'sec_header_cta',
    array(
        'title'            => __('Conteudo (principal)', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_cta_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_title_cta',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_title_cta',
    array(
        'label'                => __('Titulo', 'mobu_theme'),
        'description'        => __('Digite o titulo da sessão', 'mobu_theme'),
        'section'            => 'sec_header_cta',
        'type'                => 'text'
    )
);

// Field 2 - Text Box
$wp_customize->add_setting(
    'set_text_cta',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_text_cta',
    array(
        'label'                => __('Texto', 'mobu_theme'),
        'description'        => __('Digite o texto da sessão', 'mobu_theme'),
        'section'            => 'sec_header_cta',
        'type'                => 'textarea'
    )
);

// Field 3 - Text Box
$wp_customize->add_setting(
    'set_txt_btn_cta',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_txt_btn_cta',
    array(
        'label'                => __('Titulo (botão)', 'mobu_theme'),
        'description'        => __('Digite o titulo do botão', 'mobu_theme'),
        'section'            => 'sec_header_cta',
        'type'                => 'text'
    )
);

// Field 4 - Text Box
$wp_customize->add_setting(
    'set_link_cta',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_link_cta',
    array(
        'label'                => __('Link', 'mobu_theme'),
        'description'        => __('Digite o link do botão', 'mobu_theme'),
        'section'            => 'sec_header_cta',
        'type'                => 'url'
    )
);

/**
 *  Conteudo lateral esquerda
 */
$wp_customize->add_section(
    'sec_esq_cta',
    array(
        'title'            => __('Conteudo (lateral)', 'mobu_theme'),
        'description'    => ' ',
        'panel'         => 'panel_cta_section',
    )
);

// Field 1 - Text Box
$wp_customize->add_setting(
    'set_txt_left_cta',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_txt_left_cta',
    array(
        'label'                => __('Texto (esquerda)', 'mobu_theme'),
        'description'        => __('Digite o texto da lateral esquerda', 'mobu_theme'),
        'section'            => 'sec_esq_cta',
        'type'                => 'textarea'
    )
);

// Field 2 - Text Box
$wp_customize->add_setting(
    'set_capa_cta',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'set_capa_cta',
        array(
            'label'         => __('Capa do video', 'mobu_theme'),
            'description'   => __('Faça upload de uma imagem.', 'mobu_theme'),
            'section'       => 'sec_esq_cta',
        )
    )

);

// Field 3 - Text Box
$wp_customize->add_setting(
    'set_video_cta',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    new WP_Customize_Upload_Control(
        $wp_customize,
        'set_video_cta',
        array(
            'label'         => __('Vídeo MP4', 'nomedotema'),
            'description'   => __('Faça upload do arquivo de vídeo MP4.', 'mobu_theme'),
            'section'       => 'sec_esq_cta',
            'mime_type'     => 'video/mp4, video/webm, video/ogg',
        )
    )
);

// Field 4 - Text Box
$wp_customize->add_setting(
    'set_txt_left_final_cta',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_txt_left_final_cta',
    array(
        'label'                => __('Texto final (esquerda)', 'mobu_theme'),
        'description'        => __('Digite o texto da lateral esquerda', 'mobu_theme'),
        'section'            => 'sec_esq_cta',
        'type'                => 'textarea'
    )
);

// Field 5 - Text Box
$wp_customize->add_setting(
    'set_txt_right_final_cta',
    array(
        'type'      => 'theme_mod',
        'default'   => '',
    )
);
$wp_customize->add_control(
    'set_txt_right_final_cta',
    array(
        'label'                => __('Texto final (direita)', 'mobu_theme'),
        'description'        => __('Digite o texto da lateral esquerda', 'mobu_theme'),
        'section'            => 'sec_esq_cta',
        'type'                => 'textarea'
    )
);
