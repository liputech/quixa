<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use RT\Quixa\Helpers\Fns;

$id                     = get_the_ID();
$quixa_team_designation = get_post_meta( $id, 'quixa_team_designation', true );
$quixa_team_phone       = get_post_meta( $id, 'quixa_team_phone', true );
$quixa_team_website     = get_post_meta( $id, 'quixa_team_website', true );
$quixa_team_email       = get_post_meta( $id, 'quixa_team_email', true );
$quixa_team_address     = get_post_meta( $id, 'quixa_team_address', true );


$quixa_team_skill_info = get_post_meta( $id, 'quixa_team_skill_info', true );
$quixa_team_skill      = get_post_meta( $id, 'quixa_team_skill', true );


$socials        = (array) get_post_meta( $id, 'quixa_team_socials', true );
$socials_fields = Fns::get_team_socials();

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="team-single-item">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="team-single-content-wrap">
					<div class="team-single-content">
						<div class="team-heading">
							<h1 class="entry-title"><?php the_title(); ?></h1>
							<span class="designation"><?php echo esc_html( $quixa_team_designation ); ?></span>
						</div>
						<?php the_content(); ?>

						<!-- Team info -->

						<div class="team-info">
							<h3><?php esc_html_e( 'Information:', 'quixa' ); ?></h3>
							<ul>
								<?php if ( ! empty( $quixa_team_phone ) ) { ?>
									<li><span class="team-label"><?php esc_html_e( 'Phone', 'quixa' ); ?> : </span><a
											href="tel:<?php echo esc_html( $quixa_team_phone ); ?>"><?php echo esc_html( $quixa_team_phone ); ?></a>
									</li>
								<?php }
								if ( ! empty( $quixa_team_website ) ) { ?>
									<li><span
											class="team-label"><?php esc_html_e( 'Website', 'quixa' ); ?> : </span><?php echo esc_html( $quixa_team_website ); ?>
									</li>
								<?php }
								if ( ! empty( $quixa_team_email ) ) { ?>
									<li><span
											class="team-label"><?php esc_html_e( 'Email', 'quixa' ); ?> : </span><?php echo esc_html( $quixa_team_email ); ?>
									</li>
								<?php }
								if ( ! empty( $quixa_team_address ) ) { ?>
									<li><span class="team-label"><?php esc_html_e( 'Address', 'quixa' ); ?> : </span><?php echo esc_html( $quixa_team_address ); ?>
									</li>

								<?php } ?>
							</ul>

						</div>
						<?php if ( ! empty( $socials ) ) { ?>
							<ul class="team-social-social">
								<?php foreach ( $socials as $key => $value ):
									if(! $value){
										continue;
									}
									?>
									<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="<?php echo esc_attr( $socials_fields[ $key ]['icon'] ); ?>"></i></a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php } ?>

					</div>
					<?php //if ( ToyupTheme::$options['team_skill'] ) { ?>
					<?php if ( ! empty( $quixa_team_skill ) ) { ?>
						<div class="rt-skill-wrap">
							<div class="rt-skills">
								<h3><?php esc_html_e( 'Professional Skills', 'toyup' ); ?></h3>
								<?php echo esc_html( $quixa_team_skill_info ); ?>
								<?php foreach ( $quixa_team_skill as $skill ): ?>
									<?php
									if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
										continue;
									}
									$skill_value = (int) $skill['skill_value'];
									$skill_style = "width:{$skill_value}%;";

									if ( ! empty( $skill['skill_color'] ) ) {
										$skill_style .= " background-color:{$skill['skill_color']};";
									}
									?>
									<div class="rt-skill-each">
										<div class="rt-name"><?php echo esc_html( $skill['skill_name'] ); ?></div>
										<div class="progress">
											<div class="progress-bar progress-bar-striped"
												 data-progress="<?php echo esc_attr( $skill_value ); ?>%"
												 style="<?php echo esc_attr( $skill_style ); ?>">
												<span><?php echo esc_html( $skill_value ); ?>%</span></div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					<?php } ?>
					<?php //} ?>


				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="team-thumb sidebar-sticky">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'full' );
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
