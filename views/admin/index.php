<?php
/**
 * Template part for displaying a custom Admin area
 *
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
 *
 * @package quixa
 */

?>

<div class="wrap">
	<h1>AWPS Settings Page</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php settings_fields( 'quixa_options_group' ); ?>
		<?php do_settings_sections( 'quixa' ); ?>
		<?php submit_button(); ?>
	</form>
</div>
