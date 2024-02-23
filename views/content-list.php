<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quixa
 */


$meta_list = quixa_option( 'rt_blog_meta', '', true );
if ( quixa_option( 'rt_blog_above_meta_visibility' ) ) {
	$meta_index = array_search( 'category', $meta_list );
	unset( $meta_list[ $meta_index ] );
}
?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( quixa_post_class() ); ?>>
	<div class="article-inner-wrapper">

		<?php quixa_post_thumbnail('quixa-size2'); ?>

		<div class="entry-wrapper">
			<header class="entry-header">

				<?php
				quixa_separate_meta( 'title-above-meta' );

				if ( ! is_single() ) {
					the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
				} else {
					the_title( '<h2 class="entry-title default-max-width">', '</h2>' );
				}

				if ( ! empty( $meta_list ) && quixa_option( 'rt_meta_visibility' ) ) {
					echo quixa_post_meta( [
						'with_list'     => true,
						'with_icon'     => true,
						'include'       => $meta_list,
						'author_prefix' => quixa_option( 'rt_author_prefix' ),
					] );
				}
				?>
			</header>
			<?php if ( quixa_option( 'rt_blog_content_visibility' ) ) : ?>
				<div class="entry-content">
					<?php quixa_entry_content() ?>
				</div>
			<?php endif; ?>

			<?php quixa_entry_footer(); ?>
		</div>
	</div>
</article>
