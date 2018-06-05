<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap" id="archive">



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

				get_template_part( 'template-parts/post/content', 'image' );

				$separate_meta = __( ', ', 'twentyseventeen' );
				$categories_list = get_the_category_list( $separate_meta );
				//print all applied categories
				echo '<span class="cat-links">' . '<h3><strong>Features: </strong>' . '<span class="screen-reader-text">' . __( 'Categories', 'twentyseventeen' ) . '</span>' . $categories_list . '</h3>';

				$host = gethostname();
				echo "<a href='http://localhost:8888/" . the_title('','',false) . "'><button id='nav-button'>View Project</button></a>";
				echo '<hr />';

			endwhile;

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
		<?php get_sidebar();?>
</div><!-- .wrap -->
<script type="text/javascript" src="http://localhost:8888/wp-content/themes/twentyseventeen-child/assets/js/archive-solutions.js"></script>
<script>float_sidebar();toggle_selected();category_pathfinder();</script>
<?php get_footer();?>
