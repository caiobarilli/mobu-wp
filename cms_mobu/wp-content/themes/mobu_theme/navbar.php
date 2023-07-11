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

            <?php if (wp_is_mobile()) : ?>
                <button type="button" data-bs-toggle="collapse" data-bs-target="#menu-mobile" aria-expanded="true" aria-controls="menu-mobile">
                    <svg viewBox="0 0 20 20" height="48" width="48" focusable="false" role="img" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu icon</title>
                        <path d="M16.4 9H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zm0 4H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zM3.6 7h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1z"></path>
                    </svg>
                </button>
            <?php endif; ?>
        </div>
    </div>

    <?php if (wp_is_mobile()) : ?>
        <div id="menu-mobile" class="accordion-collapse collapse" aria-labelledby="menu-mobile">
            <div class="wrap-content">
                <?php main_nav(); ?>
                <?php social_nav(); ?>
            </div>
        </div>
    <?php endif; ?>
</nav>
