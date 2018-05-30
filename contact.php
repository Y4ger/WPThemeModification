<?php
/**
 * Template Name: Contact
 * Description: Template for displaying the contact page
 *
 */

get_header(); ?>
<div class="wrap">
	<div id="primary-fullwidth" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			//Add map
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post/content', 'image' );
				the_content();
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php //get_sidebar(); ?>
</div><!-- .wrap -->
<?php get_footer();
