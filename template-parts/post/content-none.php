<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
	</header>
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentyseventeen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p><?php _e( 'You created a combination of features no one has before! Click on the "contact" tab at the top to bring your ideas to life! Use the "explore" bar to discover new features if you are still browsing. Otherwise, enjoy mixing and matching all the features we offer!  ', 'twentyseventeen' ); ?></p>
			<?php
		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
