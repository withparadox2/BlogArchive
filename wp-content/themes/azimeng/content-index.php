<?php
/**
 * @package Azimeng
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <?php if ( 'post' == get_post_type() ) : ?>
        <div class="entry-meta">
            <?php azimeng_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>


	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'azimeng' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'azimeng' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

    <footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'azimeng' ) );
				if ( $categories_list && azimeng_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( '%1$s | ', 'azimeng' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

		
		<?php endif; // End if 'post' == get_post_type() ?>

		<span class="comments-link"><?php $comment='comments('.get_comments_number().')';comments_popup_link( $comment, $comment, $comment); ?></span>

		<?php edit_post_link( __( 'Edit', 'azimeng' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

