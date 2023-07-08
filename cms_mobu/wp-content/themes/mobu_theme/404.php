<?php

/**
 *
 * The template for displaying 404 pages (not found)
 *
 * @package MobuTheme
 *
 */

get_header();

?>

<section id="page_404">
    <header></header>

    <section class="content">
        <div class="container">
            <div class="page_content">
                <h1>
                    <?php _e('Página não encontrada!', 'mobu_theme'); ?>
                </h1>

                <p>
                    <?php _e('Esta página não existe ou ela pode ter sido removida.', 'mobu_theme'); ?>
                </p>

                <a href="javascript:history.go(-1)" alt="voltar">
                    <?php _e('Voltar', 'mobu_theme'); ?>
                </a>
            </div>
        </div>
    </section>
</section>

<?php get_footer(); ?>