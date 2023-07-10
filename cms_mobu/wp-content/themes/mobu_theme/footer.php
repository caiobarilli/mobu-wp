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
    <div class="wrap_footer">

        <?php
        if (has_custom_logo() && function_exists('the_custom_logo')) {
            the_custom_logo();
        } else {
            echo '<a href="' . home_url() . '">' . '<img src="' . get_theme_file_uri('assets/img/logo.png') . '" class="MobuTheme-logo" width="256" height="54" alt="Logo"/>' . '</a>';
        }
        ?>

        <?php social_nav(); ?>

    </div>
</footer>

<?php

wp_footer();

?>

</body>

</html>
