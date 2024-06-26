<?php

/**
 *
 * wp_mobu_theme Theme Customizer
 *
 * @package MobuTheme
 *
 */

require_once get_stylesheet_directory() . '/inc/customizer-repeater/functions.php';

function mobu_theme_customizer($wp_customize)
{
    require get_template_directory() . '/inc/customizer/about.php';
    require get_template_directory() . '/inc/customizer/course.php';
    require get_template_directory() . '/inc/customizer/cta.php';
    require get_template_directory() . '/inc/customizer/team.php';
    require get_template_directory() . '/inc/customizer/modules.php';
    require get_template_directory() . '/inc/customizer/testimonials.php';
    require get_template_directory() . '/inc/customizer/blog.php';
    require get_template_directory() . '/inc/customizer/post.php';
    require get_template_directory() . '/inc/customizer/contact.php';
}

add_action('customize_register', 'mobu_theme_customizer'); // Add custom menu in wp customizer
