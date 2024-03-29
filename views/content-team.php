<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use RT\Quixa\Helpers\Fns;

$id = get_the_ID();
$designation   	= get_post_meta( $id, 'quixa_team_designation', true );
$socials        = (array) get_post_meta( $id, 'quixa_team_socials', true );
$socials_fields = Fns::get_team_socials();

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), quixa_option( 'rt_team_excerpt_limit' ), '' );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="team-item">
		<div class="team-content-wrap">
			<div class="team-thumbs">
				<?php quixa_post_thumbnail('full'); ?>
				<?php if ( quixa_option( 'rt_team_ar_social' ) ) { ?>
				<ul class="team-social">
					<?php foreach ( $socials as $key => $value ):
						if(! $value){
							continue;
						}
						?>
						<?php if ( !empty( $value ) ): ?>
						<li class="social-item"><a class="social-link" target="_blank" href="<?php echo esc_url( $value );?>"><i class="<?php echo esc_attr( $socials_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
				<?php } ?>
			</div>
			<div class="team-content">
				<div class="team-info">
					<h3 class="team-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( quixa_option( 'rt_team_ar_designation' ) ) { ?>
					<div class="team-designation"><?php echo esc_html( $designation );?></div>
					<?php } if ( quixa_option( 'rt_team_ar_excerpt' ) ) { ?>
					<p><?php echo wp_kses( $content , 'allowed_html' ); ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</article>
