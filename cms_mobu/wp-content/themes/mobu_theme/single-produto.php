<?php

/**
 *
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MobuTheme
 *
 */

get_header();

$id = get_the_ID();
$post = get_post($id);

$categories = get_the_terms($id, 'categoria_produto');
$title = get_field('nome_produto', $id, true);
$price = get_field('preco_produto', $id, true);
$description = get_field('descricao_do_produto', $id, true);

?>

<section id="page_single_product">
    <header>
        <div class="container">
            <div class="header-content">
                <h1>
                    <strong>
                        <?php _e($title, 'mobu_theme'); ?>
                    </strong>
                </h1>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <?php

            _e($price, 'mobu_theme');
            _e($description, 'mobu_theme');

            if ($categories) : foreach ($categories as $category) :

                    _e($category->name . ' ', 'mobu_theme');

                endforeach;
            endif;


            ?>
        </div>
    </section>

</section>

<?php

get_footer();

?>