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

        <div class="close-post">
            <svg viewBox="0 0 24 24" height="48" width="48" focusable="false" role="img" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hRnJPC">
                <path d="M18 3H6a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3zm-3.29 10.29a1 1 0 0 1 0 1.42 1 1 0 0 1-1.42 0L12 13.41l-1.29 1.3a1 1 0 0 1-1.42 0 1 1 0 0 1 0-1.42l1.3-1.29-1.3-1.29a1 1 0 0 1 1.42-1.42l1.29 1.3 1.29-1.3a1 1 0 0 1 1.42 1.42L13.41 12z" data-name="close-square"></path>
            </svg>
        </div>

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
                        echo '<span>●</span>';
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

        <div class="social-share">
            <div class="social-share-title">
                <h3>
                    <?php _e('Share this post', 'mobu_theme'); ?>
                </h3>
            </div>

            <div class="social-share-icons">
                <a href="https://www.instagram.com/?url=<?php echo get_permalink(); ?>" target="_blank">
                    <svg viewBox="0 0 16 16" height="48" width="48" focusable="false" role="img" fill="#5066c1" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                    </svg>
                </a>

                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo get_the_title(); ?>&summary=<?php echo get_the_excerpt(); ?>&source=<?php echo get_bloginfo('name'); ?>" target="_blank">
                    <svg viewBox="0 0 24 24" height="48" width="48" focusable="false" role="img" fill="#5066c1" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hRnJPC">
                        <circle cx="4.983" cy="5.009" r="2.188"></circle>
                        <path d="M9.237 8.855v12.139h3.769v-6.003c0-1.584.298-3.118 2.262-3.118 1.937 0 1.961 1.811 1.961 3.218v5.904H21v-6.657c0-3.27-.704-5.783-4.526-5.783-1.835 0-3.065 1.007-3.568 1.96h-.051v-1.66H9.237zm-6.142 0H6.87v12.139H3.095z"></path>
                    </svg>
                </a>

                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
                    <svg viewBox="0 0 20 20" height="48" width="48" focusable="false" role="img" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hRnJPC">
                        <path d="M10 .4C4.698.4.4 4.698.4 10s4.298 9.6 9.6 9.6 9.6-4.298 9.6-9.6S15.302.4 10 .4zm2.274 6.634h-1.443c-.171 0-.361.225-.361.524V8.6h1.805l-.273 1.486H10.47v4.461H8.767v-4.461H7.222V8.6h1.545v-.874c0-1.254.87-2.273 2.064-2.273h1.443v1.581z"></path>
                    </svg>
                </a>

                <a href="https://api.whatsapp.com/send?text=<?php echo get_permalink(); ?>" target="_blank">
                    <svg viewBox="0 0 16 16" height="48" width="48" focusable="false" role="img" fill="#5066c1" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                    </svg>
                </a>

                <a href="mailto:?subject=<?php echo get_the_title(); ?>&body=<?php echo get_permalink(); ?>" target="_blank">
                    <svg viewBox="0 0 24 24" height="48" width="48" focusable="false" role="img" fill="#5066c1" xmlns="http://www.w3.org/2000/svg" class="StyledIconBase-sc-ea9ulj-0 hRnJPC">
                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                        <path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"></path>
                    </svg>
                </a>
            </div>

        </div>

    </div>
</div>
