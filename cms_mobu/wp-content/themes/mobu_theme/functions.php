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

require_once get_stylesheet_directory() . '/inc/plugins.php';
require_once get_stylesheet_directory() . '/inc/customizer.php';
require_once get_stylesheet_directory() . '/inc/custom-walker.php';

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
    add_image_size('logo-mobu', 256, 54, true);
    add_image_size('post-banner-slider', 1920, 1040, true);
    add_image_size('image-team', 330, 330, true);

    // Localization Support
    // load_theme_textdomain('mobu_theme', get_template_directory() . '/languages');
}

/**
 * Navigation: Main Menu
 */
function main_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'header',
            'container'       => 'div',
            'container_id'    => 'header-menu',
            'menu_class'      => 'header-menu',
            'walker'          => new Smooth_Scroll_Walker(),
        ),
    );
}

/**
 * Navigation: Social Menu
 */
function social_nav()
{
    wp_nav_menu(
        array(
            'theme_location'  => 'social',
            'container'       => 'div',
            'container_id'    => 'social-menu',
            'menu_class'      => 'social-menu',
        ),

    );
}

/**
 * Get custom field from menu item (social menu)
 */
function social_nav_svg_icons($items)
{
    foreach ($items as &$item) {
        $icon = get_field('icone_social_menu', $item);

        if ($icon) {
            $item->title = ' <img src="' . esc_url($icon['url']) . '" alt="' . esc_attr($icon['alt']) . '">';
        }
    }

    return $items;
}

/**
 * Register Navigation
 */
function mobu_theme_menu()
{
    register_nav_menus(array(
        'header'  => __('Principal', 'mobu_theme'), // Main Navigation
        'social'  => __('Social', 'mobu_theme'), // Social Navigation
    ));
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

/**
 * Load Scripts
 */
function header_scripts()
{

    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');

        global $wp_query;

        wp_register_script('mobu_theme_scripts', get_template_directory_uri() . '/dist/app.js', array(), THEME_VERSION); // App scripts
        wp_enqueue_script('mobu_theme_scripts'); // Enqueue it!

        wp_register_script('mobu_home_scripts', get_template_directory_uri() . '/dist/home.js', array(), THEME_VERSION); // Home scripts
        wp_enqueue_script('mobu_home_scripts'); // Enqueue it!

    }
}

/**
 * Load Styles
 */
function public_assets()
{
    wp_register_style('mobu_theme_styles', get_template_directory_uri() . '/dist/app.css', array(), THEME_VERSION);
    wp_enqueue_style('mobu_theme_styles'); // Enqueue it!
}

/**
 * Custom Excerpt
 *
 * Esta função retorna um trecho personalizado do conteúdo do post.
 *
 * @param int $limit O limite máximo de palavras para o trecho.
 * @return void
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
 * Custom Title
 *
 * Esta função retorna um título personalizado do post.
 *
 * @param int $limit O limite máximo de caracteres para o título.
 * @return string O título personalizado.
 */
function title_excerpt($limit)
{
    $title = get_the_title();

    if (mb_strlen($title) > $limit) {
        $title = mb_substr($title, 0, $limit) . '...';
    }

    return $title;
}

/**
 * Wp Login: change login headertitle
 */
function change_login_headertitle()
{
    return get_option('blogname');
}

/**
 * Wp Login: change login headerurl
 */
function change_login_headerurl($value)
{
    return home_url();
}

/**
 * Wp Login: change login image
 */
function change_logo_login_head()
{
    echo '<style>
            body { background-color: #080808 !important; }
            .wp-core-ui .button-primary { background: #fb9a00; border-color: #fb9a00; color: #fff; }
            .login form { background: #c86e00; border: 0; color: white; box-shadow: 0 1px 3px rgba(0,0,0,.04); }
            .login .privacy-policy-page-link { display: none; }
            .login h1 a { background-image: url(' .  get_template_directory_uri() . '/assets/img/logo.png' . ');
            background-size: contain; background-position: center center; width: 210px; }
        </style>';
}

/**
 * Wp Customizer Remove Sections
 */
function customizer_removes($wp_customize)
{
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');
    $wp_customize->remove_panel('nav_menus');
    $wp_customize->remove_panel('widgets');
}

/**
 * Retrieve the custom logo.
 * @return string|null The custom logo HTML or null if no custom logo is set.
 */
function mobu_theme_custom_logo()
{
    $id = get_theme_mod('custom_logo');

    if ($id) {

        $attr = array(
            'class'    => 'logo-mobu',
            'itemprop' => 'logo',
        );

        $alt = get_post_meta($id, '_wp_attachment_image_alt', true);

        if (empty($alt)) :
            $attr['alt'] = get_bloginfo('name', 'display');
        endif;

        $size = 'logo-mobu';

        $html = sprintf(
            '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            home_url(),
            wp_get_attachment_image($id, $size, false, $attr)
        );

        return $html;
    }

    return null;
}

/**
 * Remove Admin bar
 */
function remove_admin_bar()
{
    return false;
}

/**
 * add defer attribute to enqueued script
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
 * Remove Global styles from WordPress
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
add_filter('wpcf7_autop_or_not', '__return_false'); // Remove p tag cf7
add_filter('wp_nav_menu_objects', 'social_nav_svg_icons', 10, 2);

/*------------------------------------*\
    Actions
\*------------------------------------*/

// Add Actions
add_action('init', 'mobu_theme_menu'); // Add site menu
add_action('init', 'header_scripts'); // Add Custom Scripts to wp_head
add_action('login_head', 'change_logo_login_head'); // Change admin logo
add_action('wp_enqueue_scripts', 'public_assets', 99); // Add Theme Stylesheet
add_action('wp_enqueue_scripts', 'remove_global_styles', 100); // Remove Global styles from WordPress
add_action('customize_register', 'customizer_removes', 50); // Remove static_front_page from Wp Customizer

// Remove Actions
remove_action('wp_head', 'print_emoji_detection_script', 7); // Remove wp emoji
remove_action('wp_print_styles', 'print_emoji_styles'); // Remove wp emoji
remove_action('admin_print_scripts', 'print_emoji_detection_script'); // Remove wp emoji
remove_action('admin_print_styles', 'print_emoji_styles'); // Remove wp emoji
