<?php

/**
 * The template part displaying posts
 * @package MobuTheme
 */

$date = get_query_var('post_date');
$category = get_query_var('post_category');
$title = get_query_var('post_title');
$content = get_query_var('post_content');

?>

<div class="single-post">
    <div class="wrap-top-single-post">
        <div class="post-infos">
            <div class="date">
                <small>
                    <?php echo date('F j, Y', strtotime($date)); ?>
                </small>
            </div>
            <div class="category">
                <small>
                    <?php
                    echo '<span> ● </span>';
                    _e($category, 'mobu_theme');
                    ?>
                </small>
            </div>
        </div>
    </div>
    <div class="title-single-post">
        <h2>
            <?php _e($title, 'mobu_theme'); ?>
        </h2>
    </div>
    <div class="title-single-post">
        <?php _e($content, 'mobu_theme'); ?>
    </div>
</div>