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
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentyseventeen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<h3><?php _e( 'You created a combination of features no one has before! Click on the "contact" tab at the top to bring your ideas to life! Use the "explore" bar to discover new features if you are still browsing. Otherwise, enjoy mixing and matching all the features we offer!  ', 'twentyseventeen' ); ?></h3>
			<?php
		endif; ?>
		<header class="page-header">
			<h1 class="page-title"><?php _e( 'Recent Projects:', 'twentyseventeen' ); ?></h1>
		</header>
		<?php // Show one most recent posts.
		$recent_posts = new WP_Query( array(
			'posts_per_page'      => 3,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		) );
		?>

		<?php if ( $recent_posts->have_posts() ) : ?>

			<div class="recent-posts">

				<?php
				while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
					get_template_part( 'template-parts/post/content', 'image');
					get_template_part( 'template-parts/post/content', 'excerpt' );
				endwhile;
				wp_reset_postdata();
				?>
			</div><!-- .recent-posts -->
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
