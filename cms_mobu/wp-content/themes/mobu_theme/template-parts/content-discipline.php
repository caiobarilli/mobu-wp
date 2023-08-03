<?php

/**
 * The template part displaying posts
 * @package MobuTheme
 */

$video_embed = get_field('post_video_embed');
$next_post = get_previous_post();
$prev_post = get_next_post();

$title_discipline = get_field('title_discipline');
$subtitle_discipline = get_field('subtitle_discipline');
$text_discipline = get_field('text_discipline');


?>

<div class="single-discipline">
    <div class="wrap-top-single-post">

        <div class="close-post-discipline">
            <svg viewBox="0 0 24 24" height="48" width="48" focusable="false" role="img" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hRnJPC">
                <path d="M18 3H6a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3zm-3.29 10.29a1 1 0 0 1 0 1.42 1 1 0 0 1-1.42 0L12 13.41l-1.29 1.3a1 1 0 0 1-1.42 0 1 1 0 0 1 0-1.42l1.3-1.29-1.3-1.29a1 1 0 0 1 1.42-1.42l1.29 1.3 1.29-1.3a1 1 0 0 1 1.42 1.42L13.41 12z" data-name="close-square"></path>
            </svg>
        </div>

        <div class="post-infos">

            <div class="category">
                <strong>
                    <?php
                    $taxonomies = get_object_taxonomies('discipline');

                    if (!empty($taxonomies)) {
                        foreach ($taxonomies as $taxonomy) {
                            $terms = get_the_terms(get_the_ID(), $taxonomy);

                            if (!empty($terms) && !is_wp_error($terms)) {
                                $taxonomy_object = get_taxonomy($taxonomy);
                                $term_names = array();

                                foreach ($terms as $term) {
                                    $term_names[] = $term->name;
                                }

                                foreach ($term_names as $index => $term_name) {
                                    if ($index === count($term_names) - 1) {
                                        _e($term_name, 'mobu_theme');
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </strong>
            </div>
        </div>

    </div>

    <div class="wrap-content-single-post">

        <div class="title-single-post">
            <h2>
                <?php _e(get_the_title(), 'mobu_theme'); ?>
            </h2>
        </div>

        <?php if ($video_embed) : ?>
            <div class="video-single-post">
                <?php echo $video_embed; ?>
            </div>
        <?php endif; ?>

        <div class="content-single-post">
            <?php _e(get_the_content(), 'mobu_theme') ?>
        </div>

    </div>

    <div class="wrap-bottom-single-post">

        <div class="pagination-single-post">
            <div class="next-post-discipline <?php if (empty($next_post)) : echo "d-none";
                                                endif; ?>">
                <svg viewBox="0 0 16 16" height="48" width="48" focusable="false" role="img" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"></path>
                </svg>
                <form>
                    <input type="hidden" name="post_id" value="<?php echo $next_post->ID; ?>">
                </form>
            </div>

            <div class="previous-post-discipline <?php if (empty($prev_post)) : echo "d-none";
                                                    endif; ?>">

                <div class="text-box-discipline">
                    <strong>
                        <?php _e('LEGAL,', 'mobu_theme') ?>
                    </strong>
                    <strong>
                        <?php _e('próximo', 'mobu_theme') ?>
                    </strong>
                </div>

                <svg viewBox="0 0 16 16" height="48" width="48" focusable="false" role="img" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"></path>
                </svg>
                <form>
                    <input type="hidden" name="post_id" value="<?php echo $prev_post->ID; ?>">
                </form>
            </div>
        </div>

    </div>
</div>
