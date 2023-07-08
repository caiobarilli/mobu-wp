<?php

/**
 *
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MobuTheme
 *
 */

?>

<footer>
    <div class="container">
        <div class="col-12">
            <p>
                <?php _e('© Wordpress - Custom Theme - Todos os direitos reservados', 'mobu_theme'); ?>
            </p>
        </div>
    </div>
</footer>

<?php

get_template_part('template-parts/modal', 'privacy-policy');
wp_footer();

?>

</body>

</html>