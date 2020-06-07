<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Azimeng
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php // You can start editing here -- including this comment! ?>

    <?php if ( have_comments() ) : ?>
        <span class="comments-title">
<?php
printf( _nx( '1 Response on &ldquo;%2$s&rdquo;', '%1$s Responses on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'azimeng' ),
    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
?>
        </span>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-above" class="comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'azimeng' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'azimeng' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'azimeng' ) ); ?></div>
        </nav><!-- #comment-nav-above -->
        <?php endif; // check for comment navigation ?>

        <ol class="comment-list">
<?php
wp_list_comments('type=comment&callback=azimeng_comment');
?>
        </ol><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-below" class="comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'azimeng' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'azimeng' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'azimeng' ) ); ?></div>
        </nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>

    <?php endif; // have_comments() ?>

<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'azimeng' ); ?></p>
    <?php endif; ?>

<?php comment_form(
    array(
            'fields'=>array(
                    'author' => '<p class="comment-form-author"><label for="author" class="required">昵称</label><input type="text" aria-required="true" size="30" value="'.$comment_author.'" name="author" id="author"></p>',
                    'email' => '<p class="comment-form-email"><label for="email"  class="required">邮箱</label><input type="text" aria-required="true" size="30" value="'.$comment_author_email.'" name="email" id="email"></p>',
                    'url' => '<p class="comment-form-url"><label for="url">网站</label><input type="text" size="30" value="'.$comment_author_url.'" name="url" id="url"></p>'
            ),
            'comment_notes_before' =>' ',
            'comment_notes_after' => '',
            'comment_field' => '<div class="comment-form-comment"><label for="comment">' . _x( '评论', 'noun' ) . '</label><div><textarea id="comment" name="comment" cols="40" rows="7" aria-required="true"></textarea></div></div>',
        )
); ?>

</div><!-- #comments -->
