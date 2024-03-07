<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package quixa
 */

use RT\Quixa\Helpers\Fns;
use RT\Quixa\Options\Opt;

?>
<article data-post-id="<?php the_ID(); ?>" <?php post_class( quixa_post_class() ); ?>>
	<div class="article-inner-wrapper">

		<?php quixa_single_entry_header(); ?>
		<?php quixa_post_single_thumbnail(); ?>

		<div class="entry-wrapper">
				<div class="entry-content">
					<?php quixa_entry_content() ?>
				</div>

			<?php quixa_entry_footer(); ?>
		</div>
	</div>
</article>
