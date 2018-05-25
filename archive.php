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
				get_template_part( 'template-parts/post/content', 'excerpt' );

			endwhile;

			the_posts_pagination( array(
				'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
			) );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
		<?php get_sidebar(); ?>
</div><!-- .wrap -->
<script type="text/javascript">
	// When the user scrolls the page, execute myFunction
	window.onscroll = function() {myFunction()};

	// Get the sidebar
	var sidebar = document.getElementById("secondary");
	var header = document.getElementById("navigation-top");
	// Get the offset position of the navbar
	var sticky = header.offsetTop;

	// Add the sticky class to the sidebar and remove bottom border of nav when you reach its scroll position. Remove "sticky" when you leave the scroll position
	function myFunction() {
		if (window.pageYOffset >= sticky) {
			sidebar.classList.add("sticky-sidebar");
			header.style.border = "0px black solid";
		} else {
			sidebar.classList.remove("sticky-sidebar");
			header.style.border = "1px solid #eee";
		}
	}
</script>
<?php get_footer();
