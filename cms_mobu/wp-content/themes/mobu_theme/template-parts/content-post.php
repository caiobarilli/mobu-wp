<?php

/**
 * The template part displaying posts
 * @package MobuTheme
 */

$video_embed = get_field('post_video_embed');
$next_post = get_next_post();
$prev_post = get_previous_post();

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
    </div>

    <div class="wrap-content-single-post">
        <div class="video-single-post">
            <?php echo $video_embed; ?>
        </div>
        <div class="title-single-post">
            <h2>
                <?php _e(get_the_title(), 'mobu_theme'); ?>
            </h2>
        </div>
        <div class="content-single-post">
            <?php _e(get_the_content(), 'mobu_theme'); ?>
        </div>
    </div>

    <div class="wrap-bottom-single-post">
        <div class="pagination-single-post">
            <div class="next-post <?php if (empty($next_post)) : echo "d-none";
                                    endif; ?>">
                <svg viewBox="0 0 16 16" height="48" width="48" focusable="false" role="img" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"></path>
                </svg>
                <form>
                    <input type="hidden" name="post_id" value="<?php echo $next_post->ID; ?>">
                </form>
            </div>

            <div class="previous-post <?php if (empty($prev_post)) : echo "d-none";
                                        endif; ?>">
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
