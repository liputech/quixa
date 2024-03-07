<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'full';
$id = get_the_ID();

//$position   	= get_post_meta( $id, 'elektra_team_position', true );
//$socials       	= get_post_meta( $id, 'elektra_team_socials', true );
//$social_fields 	= ElektraTheme_Helper::team_socials();

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), 10, '' );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="team-item">
		<div class="team-content-wrap">
			<div class="team-thums">
				<?php quixa_post_thumbnail('full'); ?>
			</div>
			<div class="team-content">
				<div class="team-info">
					<h3 class="team-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

						<div class="team-designation">position</div>

						<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>

				</div>
			</div>

		</div>
	</div>
</article>
