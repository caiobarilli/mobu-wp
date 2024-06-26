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

// Curso
$title_course = get_theme_mod('set_title_course');
$text_course = get_theme_mod('set_text_course');
$img_course = get_theme_mod('set_img_course');

// CTA
$text_left_cta = get_theme_mod('set_txt_left_cta');
$capa_cta = get_theme_mod('set_capa_cta');
$video_cta = get_theme_mod('set_video_cta');
$txt_left_final_cta = get_theme_mod('set_txt_left_final_cta');
$txt_right_final_cta = get_theme_mod('set_txt_right_final_cta');

$title_cta = get_theme_mod('set_title_cta');
$text_cta = get_theme_mod('set_text_cta');
$txt_btn_cta = get_theme_mod('set_txt_btn_cta');
$link_cta = get_theme_mod('set_link_cta');

// Time
$title_team = get_theme_mod('set_title_team');
$text_team = get_theme_mod('set_text_team');

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

// News
$title_news = get_theme_mod('set_title_news');
$subtitle_news = get_theme_mod('set_subtitle_news');

// Contato
$title_contact = get_theme_mod('set_title_contact');
$shortcode_form_contact = get_theme_mod('set_shortcode_form_contact');
$customizer_repeater_social = get_theme_mod('customizer_repeater_social', json_encode(array()));
$customizer_repeater_social_decoded = json_decode($customizer_repeater_social);

// Share Link
if (isset($_GET['p'])) {
    $param_p = $_GET['p'];
    echo '<form id="share-post"> <input type="hidden" name="post_id" value="' . $param_p . '"> </form>';
}

?>

<header id="home">
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
                        <?php if (get_field('slider_link_url')) : ?>

                            <a href="<?php echo esc_url(get_field('slider_link_url')); ?>" class="wrap_banner">
                            <?php endif; ?>
                            <?php

                            if (!get_field('slider_link_url')) :
                            ?>

                                <a class="wrap_banner">
                                <?php
                            endif;

                                ?>

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
                                </a>
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
    <section id="o_que" class="about">
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

    <section id="cursos" class="course">
        <div class="left-content">
            <div class="wrap-content">
                <div class="title">
                    <h2>
                        <strong>
                            <?php _e('02', 'mobu_theme'); ?>
                        </strong>
                        <?php _e($title_course, 'mobu_theme'); ?>
                    </h2>
                </div>

                <div class="text">
                    <p>
                        <?php _e($text_course, 'mobu_theme'); ?>
                    </p>
                </div>

            </div>
            <div class="image-left-content">
                <img src="<?php echo $img_course; ?>" alt="imagem ilustrativa" />
            </div>
        </div>

        <div class="main-content">
            <div class="wrap-content">
                <div class="swiper course-slider">
                    <div class="swiper-wrapper">
                        <?php

                        $count;
                        $categories_with_posts = array();
                        $categories = get_terms(array(
                            'taxonomy' => 'modules',
                            'hide_empty' => false,
                        ));

                        foreach ($categories as $category) {
                            $post_count = $category->count;

                            if ($post_count >= 5) {
                                $categories_with_posts[] = $category;
                            }
                        }

                        foreach ($categories_with_posts as $category) {

                            $args = array(
                                'post_type' => 'discipline',
                                'order' => 'ASC',
                                'posts_per_page' => 5,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'modules',
                                        'field' => 'term_id',
                                        'terms' => $category->term_id,
                                    ),
                                ),
                            );

                            $wp_query = new WP_Query($args);

                            if ($wp_query->have_posts()) :
                                echo '<div class="swiper-slide">';
                                $count = 0;

                                while ($wp_query->have_posts()) : $wp_query->the_post();

                                    $count++;
                                    $title = get_the_title();
                                    $title_discipline = get_field('title_discipline');
                                    $subtitle_discipline = get_field('subtitle_discipline');
                                    $text_discipline = get_field('text_discipline');

                        ?>

                                    <?php

                                    /*
                                    *  Primeira coluna do grid
                                    */

                                    if ($count == 1) :

                                    ?>
                                        <div class="wrap-slider-cursos">
                                            <div class="grid-container">

                                                <div class="CatNameGridWrapper">
                                                    <div class="title-category">
                                                        <h2>
                                                            <?php _e($category->name, 'mobu_theme') ?>
                                                        </h2>
                                                    </div>
                                                </div>

                                                <div class="TopGridWrapper wrap-courses">
                                                    <div class="front-course">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <?php the_post_thumbnail('slide-course-image-large', array('class' => 'slide-course-image-large')); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="back-course">
                                                        <div class="title">
                                                            <h2>
                                                                <?php _e($title, 'mobu_theme') ?>
                                                            </h2>
                                                            <h3>
                                                                <strong>
                                                                    <?php _e($title_discipline, 'mobu_theme') ?>
                                                                </strong>
                                                                <?php _e($subtitle_discipline, 'mobu_theme') ?>
                                                            </h3>
                                                        </div>
                                                        <?php if (!wp_is_mobile()) : ?>
                                                            <div class="text">
                                                                <p>
                                                                    <?php _e(custom_excerpt(2000, $text_discipline), 'mobu_theme') ?>
                                                                </p>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="ico-course">
                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="81px" height="71px" viewBox="0 0 81 71" enable-background="new 0 0 81 71" xml:space="preserve">
                                                            <rect fill="#3C6399" width="81" height="71" />
                                                            <polygon fill="#FFFFFF" points="63,34.167 41,34.167 41,12.167 39,12.167 39,34.167 17,34.167 17,36.167 39,36.167 39,59.167 41,59.167 41,36.167 63,36.167 " />
                                                        </svg>
                                                        <form>
                                                            <input type="hidden" name="discipline_id" value="<?php echo get_the_ID(); ?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php

                                            /*
                                            *  Segunda coluna do grid
                                            */

                                            if ($count == 2) :

                                            ?>
                                                <div class="MidGridWrapper ">
                                                    <div class="LeftMidGridWrap">
                                                        <div class="TopLeftMidGridWrap wrap-courses">
                                                            <div class="front-course">
                                                                <?php if (has_post_thumbnail()) : ?>
                                                                    <?php the_post_thumbnail('slide-course-image-square', array('class' => 'slide-course-image-square')); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="back-course">
                                                                <div class="title">
                                                                    <h2>
                                                                        <?php _e($title, 'mobu_theme') ?>
                                                                    </h2>
                                                                    <h3>
                                                                        <strong>
                                                                            <?php _e($title_discipline, 'mobu_theme') ?>
                                                                        </strong>
                                                                        <?php _e($subtitle_discipline, 'mobu_theme') ?>
                                                                    </h3>
                                                                </div>
                                                                <?php if (!wp_is_mobile()) : ?>
                                                                    <div class="text">
                                                                        <p>
                                                                            <?php _e(custom_excerpt(400, $text_discipline), 'mobu_theme') ?>
                                                                        </p>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="ico-course">
                                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="81px" height="71px" viewBox="0 0 81 71" enable-background="new 0 0 81 71" xml:space="preserve">
                                                                    <rect fill="#3C6399" width="81" height="71" />
                                                                    <polygon fill="#FFFFFF" points="63,34.167 41,34.167 41,12.167 39,12.167 39,34.167 17,34.167 17,36.167 39,36.167 39,59.167 41,59.167 41,36.167 63,36.167 " />
                                                                </svg>
                                                                <form>
                                                                    <input type="hidden" name="discipline_id" value="<?php echo get_the_ID(); ?>">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php

                                                    /*
                                                    *  Terceira coluna do grid
                                                    */

                                                    if ($count == 3) :

                                                    ?>
                                                        <div class="BotLeftMidGridWrap wrap-courses">
                                                            <div class="front-course">
                                                                <?php if (has_post_thumbnail()) : ?>
                                                                    <?php the_post_thumbnail('slide-course-image-square', array('class' => 'slide-course-image-square')); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="back-course">
                                                                <div class="title">
                                                                    <h2>
                                                                        <?php _e($title, 'mobu_theme') ?>
                                                                    </h2>
                                                                    <h3>
                                                                        <strong>
                                                                            <?php _e($title_discipline, 'mobu_theme') ?>
                                                                        </strong>
                                                                        <?php _e($subtitle_discipline, 'mobu_theme') ?>
                                                                    </h3>
                                                                </div>
                                                                <?php if (!wp_is_mobile()) : ?>
                                                                    <div class="text">
                                                                        <p>
                                                                            <?php _e(custom_excerpt(400, $text_discipline), 'mobu_theme') ?>
                                                                        </p>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="ico-course">
                                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="81px" height="71px" viewBox="0 0 81 71" enable-background="new 0 0 81 71" xml:space="preserve">
                                                                        <rect fill="#3C6399" width="81" height="71" />
                                                                        <polygon fill="#FFFFFF" points="63,34.167 41,34.167 41,12.167 39,12.167 39,34.167 17,34.167 17,36.167 39,36.167 39,59.167 41,59.167 41,36.167 63,36.167 " />
                                                                    </svg>
                                                                    <form>
                                                                        <input type="hidden" name="discipline_id" value="<?php echo get_the_ID(); ?>">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php

                                                /*
                                                *  Quarta coluna do grid
                                                */

                                                if ($count == 4) :

                                                ?>
                                                    <div class="RightMidGridWrap wrap-courses">
                                                        <div class="front-course">
                                                            <?php if (has_post_thumbnail()) : ?>
                                                                <?php the_post_thumbnail('slide-course-image-retangular', array('class' => 'slide-course-image-retangular')); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="back-course">
                                                            <div class="title">
                                                                <h2>
                                                                    <?php _e($title, 'mobu_theme') ?>
                                                                </h2>
                                                                <h3>
                                                                    <strong>
                                                                        <?php _e($title_discipline, 'mobu_theme') ?>
                                                                    </strong>
                                                                    <?php _e($subtitle_discipline, 'mobu_theme') ?>
                                                                </h3>
                                                            </div>
                                                            <?php if (!wp_is_mobile()) : ?>
                                                                <div class="text">
                                                                    <p>
                                                                        <?php _e(custom_excerpt(1100, $text_discipline), 'mobu_theme') ?>
                                                                    </p>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div class="ico-course">
                                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="81px" height="71px" viewBox="0 0 81 71" enable-background="new 0 0 81 71" xml:space="preserve">
                                                                    <rect fill="#3C6399" width="81" height="71" />
                                                                    <polygon fill="#FFFFFF" points="63,34.167 41,34.167 41,12.167 39,12.167 39,34.167 17,34.167 17,36.167 39,36.167 39,59.167 41,59.167 41,36.167 63,36.167 " />
                                                                </svg>
                                                                <form>
                                                                    <input type="hidden" name="discipline_id" value="<?php echo get_the_ID(); ?>">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php

                                            /*
                                            *  Quinta coluna do grid
                                            */

                                            if ($count == 5) :

                                            ?>
                                                <div class="BotGridWrapper wrap-courses">
                                                    <div class="front-course">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <?php the_post_thumbnail('slide-course-image-bottom', array('class' => 'slide-course-image-bottom')); ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="back-course">
                                                        <div class="title">
                                                            <h2>
                                                                <?php _e($title, 'mobu_theme') ?>
                                                            </h2>
                                                            <h3>
                                                                <strong>
                                                                    <?php _e($title_discipline, 'mobu_theme') ?>
                                                                </strong>
                                                                <?php _e($subtitle_discipline, 'mobu_theme') ?>
                                                            </h3>
                                                        </div>
                                                        <?php if (!wp_is_mobile()) : ?>
                                                            <div class="text">
                                                                <p>
                                                                    <?php _e(custom_excerpt(800, $text_discipline), 'mobu_theme') ?>
                                                                </p>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="ico-course">
                                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="81px" height="71px" viewBox="0 0 81 71" enable-background="new 0 0 81 71" xml:space="preserve">
                                                                <rect fill="#3C6399" width="81" height="71" />
                                                                <polygon fill="#FFFFFF" points="63,34.167 41,34.167 41,12.167 39,12.167 39,34.167 17,34.167 17,36.167 39,36.167 39,59.167 41,59.167 41,36.167 63,36.167 " />
                                                            </svg>
                                                            <form>
                                                                <input type="hidden" name="discipline_id" value="<?php echo get_the_ID(); ?>">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                        <?php

                                endwhile;

                                echo '</div>';

                                wp_reset_postdata();

                            endif;
                        }

                        ?>
                    </div>
                    <?php if (count($categories_with_posts) >= 2) : ?>
                        <div class="wrap-pagination">
                            <div class="swiper-pagination"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="single-post-discipline">
            <span class="backdrop-post-discipline close-post-discipline"></span>
            <div class="wrap-single-post-discipline">
            </div>
        </div>
    </section>

    <section id="pra_quem" class="cta">
        <?php if (wp_is_mobile()) : ?>
            <div class="main-content">
                <div class="wrap-content">
                    <div class="title">
                        <h2>
                            <strong>
                                <?php _e('03', 'mobu_theme'); ?>
                            </strong>
                            <?php _e($title_cta, 'mobu_theme'); ?>
                        </h2>
                    </div>
                    <div class="text">
                        <p>
                            <?php _e($text_cta, 'mobu_theme'); ?>
                        </p>
                        <div class="btn-cta">
                            <a href=" <?php echo $link_cta; ?>">
                                <?php _e($txt_btn_cta, 'mobu_theme'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="left-content">
            <div class="wrap-content">
                <div class="text">
                    <p>
                        <?php _e($text_left_cta, 'mobu_theme'); ?>
                    </p>
                </div>
                <div class="wrap-video-cta">
                    <video class="video-cta" poster="<?php echo $capa_cta; ?>">
                        <source src="<?php echo $video_cta; ?>" type="video/mp4">
                    </video>
                </div>
                <div class="content">
                    <div class="left-text">
                        <p>
                            <?php _e($txt_left_final_cta, 'mobu_theme'); ?>
                        </p>
                    </div>
                    <div class="right-text">
                        <p>
                            <?php _e($txt_right_final_cta, 'mobu_theme'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!wp_is_mobile()) : ?>
            <div class="main-content">
                <div class="wrap-content">
                    <div class="title">
                        <h2>
                            <strong>
                                <?php _e('03', 'mobu_theme'); ?>
                            </strong>
                            <?php _e($title_cta, 'mobu_theme'); ?>
                        </h2>
                    </div>
                    <div class="text">
                        <p>
                            <?php _e($text_cta, 'mobu_theme'); ?>
                        </p>
                        <div class="btn-cta">
                            <a class="smooth-scroll" href="<?php echo $link_cta; ?>">
                                <?php _e($txt_btn_cta, 'mobu_theme'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>

    <section id="time" class="team">
        <div class="left-content">
            <div class="wrap-content">
                <div class="title">
                    <h2>
                        <strong>
                            <?php _e('04', 'mobu_theme'); ?>
                        </strong>
                        <?php _e($title_team, 'mobu_theme'); ?>
                    </h2>
                </div>
                <div class="text">
                    <p>
                        <?php _e($text_team, 'mobu_theme'); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="wrap-team">
                <?php

                $args = array(
                    'post_type' => 'team',
                    'order' => 'ASC',
                    'posts_per_page' => -1,
                );

                $wp_query = new WP_Query($args);

                if ($wp_query->have_posts()) :
                    while ($wp_query->have_posts()) : $wp_query->the_post();

                        $name_team = get_field('name_team');
                        $text_team = get_field('text_team');

                ?>

                        <div class="wrap-dev">
                            <div class="front-team">
                                <div class="img-banner">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('image-team', array('class' => 'image-team')); ?>
                                    <?php else : ?>
                                        <img class="image-team" src="https://dummyimage.com/330x330" alt="..." />
                                    <?php endif; ?>
                                </div>
                                <div class="title-banner">
                                    <h2>
                                        <strong>
                                            <?php _e(get_the_title(), 'mobu_theme') ?>
                                        </strong>
                                    </h2>
                                </div>
                            </div>
                            <div class="back-team">
                                <div class="content">
                                    <div class="title">
                                        <h3>
                                            <?php _e($name_team, 'mobu_theme') ?>
                                        </h3>
                                    </div>
                                    <div class="text">
                                        <p>
                                            <?php _e(custom_excerpt(650, $text_team), 'mobu_theme') ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <img class="ico-team" src="data:image/png;base64,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UmVhZHlxyWU8AAADI2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNi4wLWMwMDIgNzkuMTY0MzUyLCAyMDIwLzAxLzMwLTE1OjUwOjM4ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMSAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6Nzc2MzE0NTYyMENGMTFFRTlBRkFCODJGNzUyM0JBQzYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Nzc2MzE0NTcyMENGMTFFRTlBRkFCODJGNzUyM0JBQzYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo3NzYzMTQ1NDIwQ0YxMUVFOUFGQUI4MkY3NTIzQkFDNiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo3NzYzMTQ1NTIwQ0YxMUVFOUFGQUI4MkY3NTIzQkFDNiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PrptyckAAAFlSURBVHja7JtNioNAEIV1DL0JLvQqgmuP4F28hifwGt7GjboQFEQF3SkYIcyfBBedDJSZ71sICbTR56tXZUMMAwAAAEAmloSL8H3ftu22bYWI8iHhIsIwDIJAjlNEiDIMwziOiPIL0zRFZYoIUdZ1FaULTpEqyt0siEL5nA0yRXD5kCk4haDVdgrlQ/dBlDcYZwVlCkHLnIJTCFpE+U8NCKcwp9B9zi3KsizzPMsRRef5uK4bRdH9ff/nW7/eDsC2yvO8aZqyLHtyD+Fred/3cRxrn+eisWb7ySRJjM/NoZ06xx8f3sN2rOs6TdPjWz34ZseTvrvoPZCyLF9o167rmqYpioJM+cayLKUUQbvvPgxvzCnMKYz5rywfMuVB+eAUgpZMQRQyBacgCkgVhTGfOYWtA5xC0P5x+RC00iuITGFOOZEojuNcr1c5ooj4t6lSKs/zqqpofAAAAAAAAAAA8C7cBBgA9NusOogwnJgAAAAASUVORK5CYII=" width="92" height="80" alt="icone ilustrativo">
                        </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <section id="precos" class="plans">

        <div class="title-plans">
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
                        $count = 0;
                        if (count($customizer_repeater_clients_decoded) >= 2) :
                            foreach ($customizer_repeater_clients_decoded as $repeater_item) :
                        ?>

                                <?php if ($count <= 1) { ?>
                                    <div class="image featured-img">
                                    <?php } else { ?>
                                        <div class="image">
                                        <?php } ?>

                                        <?php if ($repeater_item->link) : ?>
                                            <a href="<?php echo esc_url($repeater_item->link); ?>">
                                            <?php endif ?>

                                            <img src="<?php echo $repeater_item->image_url; ?>" alt="Imagem ilustrativa" />

                                            <?php if ($count <= 1) : ?>
                                            </a>
                                        <?php endif ?>
                                        </div>
                                <?php
                                $count++;
                            endforeach;
                        endif;
                                ?>

                                    </div>
                    </div>

                </div>
            </div>
    </section>

    <div class="full-post-wrap">

        <div class="single-post-news">
            <span class="backdrop-post-news close-post"></span>
            <div class="wrap-single-post">
            </div>
        </div>

        <section id="news" class="news">
            <?php if (wp_is_mobile()) : ?>
                <div class="main-content">
                    <div class="wrap-content">
                        <div class="title">
                            <h2>
                                <strong>
                                    <?php _e('04', 'mobu_theme'); ?>
                                </strong>
                                <?php _e($title_news, 'mobu_theme'); ?>
                            </h2>
                        </div>
                        <div class="text">
                            <p>
                                <?php _e($subtitle_news, 'mobu_theme'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="left-content">
                <div class="wrap-content">

                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'order' => 'DESC',
                        'posts_per_page' => 6,
                    );

                    $wp_query = new WP_Query($args);

                    if ($wp_query->have_posts()) :
                        while ($wp_query->have_posts()) : $wp_query->the_post();

                    ?>
                            <div class="single-news">
                                <div class="wrap-single-news">
                                    <div class="news-infos">
                                        <div class="date">
                                            <small>
                                                <?php echo date('F j, Y', strtotime(get_the_date())); ?>
                                            </small>
                                        </div>
                                        <div class="category">
                                            <small>
                                                <?php
                                                $categories = get_the_category();
                                                if (!empty($categories)) {
                                                    $last_category = array_pop($categories);
                                                    echo '<span> ● </span>';
                                                    _e($last_category->name, 'mobu_theme');
                                                }
                                                ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="news-content">
                                        <a href="#" class="title">
                                            <h3>
                                                <?php _e(title_excerpt(60), 'mobu_theme'); ?>
                                            </h3>
                                        </a>
                                        <a href="#" class="text">
                                            <p>
                                                <?php

                                                if (get_the_excerpt()) {
                                                    echo custom_excerpt(94, get_the_excerpt());
                                                } elseif (get_the_content()) {
                                                    echo custom_excerpt(94, get_the_content());
                                                }

                                                ?>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                                <form>
                                    <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
                                </form>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </div>
            </div>

            <?php if (!wp_is_mobile()) : ?>
                <div class="main-content">
                    <div class="wrap-content">
                        <div class="title">
                            <h2>
                                <strong>
                                    <?php _e('04', 'mobu_theme'); ?>
                                </strong>
                                <?php _e($title_news, 'mobu_theme'); ?>
                            </h2>
                        </div>
                        <div class="text">
                            <p>
                                <?php _e($subtitle_news, 'mobu_theme'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>

        <section id="contato" class="contact">
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

    </div>
</main>

<?php

get_footer();

?>
