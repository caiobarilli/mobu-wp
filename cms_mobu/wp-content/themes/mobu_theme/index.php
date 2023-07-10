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
    <div class="swiper header-slider">
        <div class="swiper-wrapper">

            <?php

            $args = array(
                'post_type' => 'banner_slider',
                'order' => 'DESC',
                'posts_per_page' => -1,
            );

            $wp_query = new WP_Query($args);

            if ($wp_query->have_posts()) :
                while ($wp_query->have_posts()) : $wp_query->the_post();

            ?>

                    <div class="swiper-slide">
                        <div class="wrap_banner">
                            <div class="img_banner">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('post-banner-slider', array('class' => 'post-banner-slider')); ?>
                                <?php else : ?>
                                    <img class="post-banner-slider" src="https://dummyimage.com/1920x1040" alt="..." />
                                <?php endif; ?>
                            </div>
                            <div class="title_banner">
                                <h1>
                                    <?php _e(get_the_title(), 'mobu_theme') ?>
                                </h1>
                            </div>
                        </div>
                    </div>

            <?php
                endwhile;
                wp_reset_postdata();
            endif;

            ?>


        </div>
        <div class="swiper-pagination"></div>
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
