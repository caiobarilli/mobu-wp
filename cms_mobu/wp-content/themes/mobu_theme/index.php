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

// O que é
$title_about = get_theme_mod('set_title_about');
$text_about = get_theme_mod('set_text_about');
$title_services_about = get_theme_mod('set_title_services_about');
$customizer_repeater_services = get_theme_mod('customizer_repeater_services', json_encode(array()));
$customizer_repeater_services_decoded = json_decode($customizer_repeater_services);

// Contato
$title_contact = get_theme_mod('set_title_contact');
$shortcode_form_contact = get_theme_mod('set_shortcode_form_contact');
$customizer_repeater_social = get_theme_mod('customizer_repeater_social', json_encode(array()));
$customizer_repeater_social_decoded = json_decode($customizer_repeater_social);

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
                                    <strong>
                                        <?php _e(get_the_title(), 'mobu_theme') ?>
                                    </strong>
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
        <div class="wrap-pagination">
            <div class="swiper-pagination"></div>
        </div>
    </div>
</header>

<main>

    <section class="about">

        <div class="left-content">
            <div class="title">
                <h2>
                    <?php _e($title_about, 'mobu_theme'); ?>
                </h2>
            </div>
            <div class="text">
                <p>
                    <?php _e($text_about, 'mobu_theme'); ?>
                </p>
            </div>
        </div>

        <div class="main-content">
            <?php if (count($customizer_repeater_services_decoded) >= 2) : ?>
                <div>
                    <?php foreach ($customizer_repeater_services_decoded as $repeater_item) : ?>
                        <div>
                            <img src="<?php echo $repeater_item->image_url; ?>" alt="Icone ilustrativo" />
                            <p>
                                <?php _e($repeater_item->text, 'mobu_theme'); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    </section>


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
