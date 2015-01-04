<?php

/**
 * Debug and die.
 *
 * @param  object $param variable
 */
function dd($param)
{
    echo '<pre dir="ltr">';
    if(is_array($param))
        print_r($param);
    else
        var_dump($param);
    echo '</pre>';
    die();
}

/**
 * Get asset file based on revisioned (hashed) file map (assets/manifest.json)
 *
 * @param  string $filename asset file name
 * @return string           hashed name for the asset file if key exists in manifest.json or the exact file if key doesn't exist.
 */
function asset($filename) {
    $assets = trailingslashit(get_template_directory_uri()) . 'assets/';
    $manifest_path = trailingslashit(get_template_directory()) . 'assets/manifest.json';

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);
    } else {
        $manifest = [];
    }

    if (array_key_exists($filename, $manifest)) {
        return $assets . $manifest[$filename];
    }

    return $assets . $filename;
}

/**
 * Display the comment box
 *
 * @param object $comment  the comment
 * @param array $args      argument for the comment
 * @param int $depth       how deep (in comment replies) should the comments be fetched
 */
function display_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    ?>
    <div class="row">
        <div class='medium-12 columns card comment-card'>
            <header>
                <div class="row">
                    <div class="medium-2 columns show-for-medium-up comment-header">
                        <?php echo get_avatar( $comment ); ?>
                    </div>
                    <div class="medium-10 small-12 columns">
                        <?php printf( '<cite class="fn">%s</cite> <span class="says">كتب</span>', get_comment_author_link() ); ?>
                        <br/><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                            <?php
                            /* translators: 1: date, 2: time */
                            $d = 'd/m/Y';
                            $t = 'g:i a';
                            echo get_comment_date( $d );
                            echo ' في ';
                            echo get_comment_time( $t );?>
                        </a><?php edit_comment_link( 'تعديل', '', '' ); ?>
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="medium-10 small-12 columns comment-text">
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em class="comment-awaiting-moderation"><?php echo 'يحتاج التعليق إلى موافقة' ?> </em>
                        <div class="clearfix"></div>
                    <?php else : ?>
                        <?php comment_text(); ?>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <?php comment_reply_link( array_merge( $args, array(
                        'reply_text' => 'إرسال رد',
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth']
                    ) ) ); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

