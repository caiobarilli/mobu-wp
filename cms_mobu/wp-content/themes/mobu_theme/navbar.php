<?php

/**
 *
 * The template part for navigation
 *
 * @package MobuTheme
 *
 */
?>

<nav id="main-nav" class="navbar navbar-expand-lg">
    <div class="container">
        <div class="wrap-content">
            <div class="navbar-brand">
                <?php
                if (has_custom_logo() && function_exists('the_custom_logo')) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . home_url() . '">' . '<img src="' . get_theme_file_uri('assets/img/logo.png') . '" class="CustomTheme-logo" width="256" height="54" alt="Logo"/>' . '</a>';
                }
                ?>
            </div>

            <?php

            if (!wp_is_mobile()) :
                main_nav();
                social_nav();
            endif;

            ?>

        </div>
    </div>
</nav>
