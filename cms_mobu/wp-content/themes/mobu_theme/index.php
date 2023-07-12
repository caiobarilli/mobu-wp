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

// Modulos
$title_modules = get_theme_mod('set_title_modules');

$title_module_i = get_theme_mod('set_title_module_i');
$title_module_ii = get_theme_mod('set_title_module_ii');
$title_module_iii = get_theme_mod('set_title_module_iii');

$subtitle_module_i = get_theme_mod('set_subtitle_module_i');
$subtitle_module_ii = get_theme_mod('set_subtitle_module_ii');
$subtitle_module_iii = get_theme_mod('set_subtitle_module_iii');

$price_module_i = get_theme_mod('set_price_module_i');
$price_module_ii = get_theme_mod('set_price_module_ii');
$price_module_iii = get_theme_mod('set_price_module_iii');

$text_module_i = get_theme_mod('set_text_module_i');
$text_module_ii = get_theme_mod('set_text_module_ii');
$text_module_iii = get_theme_mod('set_text_module_iii');

$link_module_i = get_theme_mod('set_link_module_i');
$link_module_ii = get_theme_mod('set_link_module_ii');
$link_module_iii = get_theme_mod('set_link_module_iii');

$title_module_others = get_theme_mod('set_title_module_others');
$link_module_others = get_theme_mod('set_link_module_others');

// Testimonial / Depoimentos
$customizer_repeater_depoimentos = get_theme_mod('customizer_repeater_depoimentos', json_encode(array()));
$customizer_repeater_depoimentos_decoded = json_decode($customizer_repeater_depoimentos);
$customizer_repeater_clients = get_theme_mod('customizer_repeater_clients', json_encode(array()));
$customizer_repeater_clients_decoded = json_decode($customizer_repeater_clients);

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
            <div class="wrap-content">
                <div class="title">
                    <h2>
                        <strong>
                            <?php _e('01', 'mobu_theme'); ?>
                        </strong>
                        <?php _e($title_about, 'mobu_theme'); ?>
                    </h2>
                </div>
                <div class="text">
                    <p>
                        <?php _e($text_about, 'mobu_theme'); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="wrap-content">
                <div class="title">
                    <h3>
                        <?php _e($title_services_about, 'mobu_theme'); ?>
                    </h3>
                </div>

                <div class="wrap-servicos">
                    <?php
                    if (count($customizer_repeater_services_decoded) >= 2) :
                        foreach ($customizer_repeater_services_decoded as $repeater_item) :
                    ?>

                            <div class="item-servico">
                                <div class="icon-servico">
                                    <img src="<?php echo $repeater_item->image_url; ?>" height="80" width="80" alt="Icone ilustrativo" />
                                </div>
                                <div class="content-servico">
                                    <div class="title">
                                        <h4>
                                            <?php _e($repeater_item->title, 'mobu_theme'); ?>
                                        </h4>
                                    </div>
                                    <div class="text">
                                        <p>
                                            <?php _e($repeater_item->text, 'mobu_theme'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="course"></section>
    <section class="cta"></section>
    <section class="team"></section>

    <section class="plans">

        <div class="title">
            <h2>
                <?php _e($title_modules, 'mobu_theme'); ?>
            </h2>
        </div>

        <div class="wrap-plans">

            <div class="wrap-single-plan">
                <div class="single-plan">
                    <div class="title">
                        <h3>
                            <?php _e($title_module_i, 'mobu_theme'); ?>
                        </h3>
                        <h4>
                            <?php _e($subtitle_module_i, 'mobu_theme'); ?>
                        </h4>
                    </div>
                    <div class="content">
                        <div class="price">
                            <p>
                                <strong>
                                    <?php _e($price_module_i, 'mobu_theme'); ?>
                                </strong>
                            </p>
                        </div>
                        <div class="text">
                            <p>
                                <?php _e($text_module_i, 'mobu_theme'); ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="<?php echo $link_module_i; ?>">
                                <?php _e('Escolher', 'mobu_theme'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap-single-plan">
                <div class="single-plan">
                    <div class="title">
                        <h3>
                            <?php _e($title_module_ii, 'mobu_theme'); ?>
                        </h3>
                        <h4>
                            <?php _e($subtitle_module_ii, 'mobu_theme'); ?>
                        </h4>
                    </div>
                    <div class="content">
                        <div class="price">
                            <p>
                                <strong>
                                    <?php _e($price_module_ii, 'mobu_theme'); ?>
                                </strong>
                            </p>
                        </div>
                        <div class="text">
                            <p>
                                <?php _e($text_module_ii, 'mobu_theme'); ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="<?php echo $link_module_ii; ?>">
                                <?php _e('Escolher', 'mobu_theme'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap-single-plan">
                <div class="single-plan">
                    <div class="title">
                        <h3>
                            <?php _e($title_module_iii, 'mobu_theme'); ?>
                        </h3>
                        <h4>
                            <?php _e($subtitle_module_iii, 'mobu_theme'); ?>
                        </h4>
                    </div>
                    <div class="content">
                        <div class="price">
                            <p>
                                <strong>
                                    <?php _e($price_module_iii, 'mobu_theme'); ?>
                                </strong>
                            </p>
                        </div>
                        <div class="text">
                            <p>
                                <?php _e($text_module_iii, 'mobu_theme'); ?>
                            </p>
                        </div>
                        <div class="link">
                            <a href="<?php echo $link_module_iii; ?>">
                                <?php _e('Escolher', 'mobu_theme'); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="other-plan">
                    <div class="title">
                        <p>
                            <?php _e($title_module_others, 'mobu_theme'); ?>
                        </p>
                    </div>
                    <div class="content">
                        <a href="<?php echo $link_module_others; ?>">
                            <?php _e('Aqui', 'mobu_theme'); ?>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <div class="swiper testimonials-slider">
                        <div class="swiper-wrapper">
                            <?php
                            if (count($customizer_repeater_depoimentos_decoded) >= 2) :
                                foreach ($customizer_repeater_depoimentos_decoded as $repeater_item) :
                            ?>

                                    <div class="swiper-slide">
                                        <div class="wrap-testimonial">
                                            <div class="wrap-text">
                                                <p>
                                                    <?php _e($repeater_item->text, 'mobu_theme'); ?>
                                                </p>
                                            </div>

                                            <div class="wrap-profile">
                                                <div class="image">
                                                    <img src="<?php echo $repeater_item->image_url; ?>" height="100" width="100" alt="Imagem ilustrativa" />
                                                </div>
                                                <div class="content">
                                                    <p>
                                                        <strong>
                                                            <?php _e($repeater_item->title, 'mobu_theme'); ?>
                                                        </strong>
                                                        <?php _e($repeater_item->subtitle, 'mobu_theme'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="wrap-pagination">
                            <div class="swiper-pagination swiper-pagination-testimonials"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrap-clients">
                        <?php
                        if (count($customizer_repeater_clients_decoded) >= 2) :
                            foreach ($customizer_repeater_clients_decoded as $repeater_item) :
                        ?>
                                <div class="image">
                                    <img src="<?php echo $repeater_item->image_url; ?>" alt="Imagem ilustrativa" />
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="blog"></section>

    <section class="contact">
        <div class="left-content">
            <div class="wrap-content">
                <div class="title">
                    <h2>
                        <strong>
                            <?php _e('05', 'mobu_theme'); ?>
                        </strong>
                        <?php _e($title_contact, 'mobu_theme'); ?>
                    </h2>
                </div>
                <ul class="social">
                    <?php
                    if (count($customizer_repeater_social_decoded) >= 2) :
                        foreach ($customizer_repeater_social_decoded as $repeater_item) :
                    ?>

                            <li>
                                <a href="<?php echo $repeater_item->link; ?>">
                                    <img src="<?php echo $repeater_item->image_url; ?>" height="60" width="60" alt="Icone ilustrativo" />
                                </a>
                            </li>

                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="wrap-form">
                <?php echo do_shortcode($shortcode_form_contact); ?>
            </div>
        </div>
    </section>

</main>

<?php

get_footer();

?>
