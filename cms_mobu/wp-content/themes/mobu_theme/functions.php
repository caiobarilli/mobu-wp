<?php

/**
 *
 * App functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MobuTheme
 *
 */

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

require_once get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php';
require_once get_stylesheet_directory() . '/inc/plugins.php';

/*------------------------------------*\
    Constansts
\*------------------------------------*/

define('THEME_VERSION', wp_get_theme()->get('Version'));

/*------------------------------------*\
    Theme
\*------------------------------------*/

/**
 *
 * Theme Support
 *
 */
if (function_exists('add_theme_support')) {
    add_theme_support('menus'); // Add Menu Support
    add_theme_support('custom-logo'); // Add Custom Logo Support

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');

    // Localisation Support
    // load_theme_textdomain('mobu_theme', get_template_directory() . '/languages');
}

/**
 *
 * Navigation: Main Menu
 *
 */
function main_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_class' => 'collapse collapse-horizontal',
            'container_id'    => 'menu',
            'menu_class'      => 'navbar-nav',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ),
    );
}

/**
 *
 * Register Navigation
 *
 */
function mobu_theme_menu()
{
    register_nav_menus(array(
        'header-menu'  => __('Menu Principal', 'mobu_theme'), // Main Navigation
    ));
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

/**
 *
 * Load Scripts
 *
 */
function header_scripts()
{

    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');

        global $wp_query;

        wp_register_script('mobu_theme_scripts', get_template_directory_uri() . '/dist/main.js', array(), THEME_VERSION); // Custom scripts
        wp_enqueue_script('mobu_theme_scripts'); // Enqueue it!

    }
}

/**
 *
 * Load Styles
 *
 */
function public_assets()
{
    wp_register_style('mobu_theme_styles', get_template_directory_uri() . '/dist/main.css', array(), THEME_VERSION);
    wp_enqueue_style('mobu_theme_styles'); // Enqueue it!
}

/**
 *
 * Custom Excerpt
 *
 */
function post_excerpt($limit)
{
    $my_excerpt = apply_filters('the_excerpt', get_the_excerpt());
    $excerpt = explode(' ', $my_excerpt, $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }

    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    echo $excerpt;
}

/**
 *
 * Custom Excerpt Length (the_excerpt)
 *
 */
function custom_excerpt_length($length)
{
    return 45;
}

/**
 *
 * Wp Login: change login headertitle
 *
 */
function change_login_headertitle()
{
    return get_option('blogname');
}

/**
 *
 * Wp Login: change login headerurl
 *
 */
function change_login_headerurl($value)
{
    return home_url();
}

/**
 *
 * Wp Login: change login image
 *
 */
function change_logo_login_head()
{
    echo '<style>
            .login .privacy-policy-page-link { display: none; }
            .login h1 a { background-image: url(' .  get_template_directory_uri() . '/assets/img/logo.png' . ');
            background-size: contain; background-position: center center; width: 210px; }
        </style>';
}

/**
 *
 * Wp Customizer Remove Sections
 *
 */
function customizer_removes($wp_customize)
{
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
    $wp_customize->remove_panel('nav_menus');
    $wp_customize->remove_panel('widgets');
}

/**
 *
 * Change the custom logo
 *
 */
function mobu_theme_custom_logo()
{

    // The logo
    $custom_logo_id = get_theme_mod('custom_logo');

    // If has logo
    if ($custom_logo_id) {

        // Attr
        $custom_logo_attr = array(
            'class'    => 'CustomTheme-logo',
            'itemprop' => 'logo',
        );

        // Image alt
        $image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
        if (empty($image_alt)) {
            $custom_logo_attr['alt'] = get_bloginfo('name', 'display');
        }

        // Get the image
        $html = sprintf(
            '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            home_url(),
            wp_get_attachment_image($custom_logo_id, 'full', false, $custom_logo_attr)
        );
    }

    // Return
    return $html;
}

/**
 *
 * Remove Admin bar
 *
 */
function remove_admin_bar()
{
    return false;
}

/**
 *
 * add defer attribute to enqueued script
 *
 */
function script_defer_attribute($tag, $handle, $src)
{
    if ($handle === 'mobu_theme_scripts') {
        if (false === stripos($tag, 'defer')) {
            $tag = str_replace('<script ', '<script defer ', $tag);
        }
    }

    return $tag;
}

/**
 *
 * Remove Global styles from WordPress
 *
 */
function remove_global_styles()
{
    wp_dequeue_style('global-styles');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('classic-theme-styles');
}

/*------------------------------------*\
    Filters
\*------------------------------------*/

// Add Filters
add_filter('login_headertitle', 'change_login_headertitle'); // Change admin header title
add_filter('login_headerurl', 'change_login_headerurl'); // Change admin logo url
add_filter('get_custom_logo', 'mobu_theme_custom_logo'); // Change admin logo
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('script_loader_tag', 'script_defer_attribute', 10, 3); // Add defer to enqueued script
add_filter('excerpt_length', 'custom_excerpt_length'); // Custom Excerpt Length (the_excerpt)
add_filter('wpcf7_autop_or_not', '__return_false'); // Remove p tag cf7

/*------------------------------------*\
    Actions
\*------------------------------------*/

// Add Actions
add_action('init', 'mobu_theme_menu'); // Add site menu
add_action('init', 'header_scripts'); // Add Custom Scripts to wp_head
add_action('login_head', 'change_logo_login_head'); // Change admin logo
add_action('wp_enqueue_scripts', 'public_assets', 99); // Add Theme Stylesheet
add_action('wp_enqueue_scripts', 'remove_global_styles', 99); // Remove Global styles from WordPress
add_action('customize_register', 'customizer_removes', 50); // Remove static_front_page from Wp Customizer
add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // Authenticated users
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // Non-authenticated users
add_action('wp_ajax_loadmore_search', 'loadmore_search_ajax_handler'); // Authenticated users
add_action('wp_ajax_nopriv_loadmore_search', 'loadmore_search_ajax_handler'); // Non-authenticated users
add_action('wp_ajax_loadmore_category', 'loadmore_category_ajax_handler'); // Authenticated users
add_action('wp_ajax_nopriv_loadmore_category', 'loadmore_category_ajax_handler'); // Non-authenticated users
add_action('wp_ajax_loadmore_tags', 'loadmore_tags_ajax_handler'); // Authenticated users
add_action('wp_ajax_nopriv_loadmore_tags', 'loadmore_tags_ajax_handler'); // Non-authenticated users
add_action('phpmailer_init', 'send_smtp_email'); // SMTP MailHog

// Remove Actions
remove_action('wp_head', 'print_emoji_detection_script', 7); // Remove wp emoji
remove_action('wp_print_styles', 'print_emoji_styles'); // Remove wp emoji
remove_action('admin_print_scripts', 'print_emoji_detection_script'); // Remove wp emoji
remove_action('admin_print_styles', 'print_emoji_styles'); // Remove wp emoji