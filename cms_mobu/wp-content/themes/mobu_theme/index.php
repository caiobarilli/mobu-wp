<?php

/**
 *
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MobuTheme
 *
 */

get_header();

?>

<header>
    <div class="container">
        <div class="swiper header-slider">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="wrap_banner">
                        <div class="title_banner">
                            <h1>
                                <?php _e('Title', 'mobu_theme') ?>
                            </h1>
                        </div>
                        <img src="" alt="">
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</header>

<main>

    <section class="about"></section>
    <section class="course"></section>
    <section class="cta"></section>
    <section class="team"></section>
    <section class="plans"></section>
    <section class="blog"></section>
    <section class="contato"></section>

</main>

<?php

get_footer();

?>
