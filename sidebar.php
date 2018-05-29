<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'twentyseventeen' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<?php

				$custom_query = new WP_Query(
				array(
				    'cat' => get_query_var('cat')
				  )
				);
				if ($custom_query->have_posts()) :
				while ($custom_query->have_posts()) : $custom_query->the_post();
				    $posttags = get_the_tags();
				    if ($posttags) {
				        foreach($posttags as $tag) {
				            $all_tags[] = $tag->term_id;
				        }
				    }
				endwhile;
				endif;

				$tags_arr = array_unique($all_tags);
				$tags_str = implode(",", $tags_arr);

				$args = array(
				'smallest'  => 12,
				'largest'   => 12,
				'unit'      => 'px',
				'number'    => 0,
				'format'    => 'list',
				'include'   => $tags_str
			);
			?>
			<section id="tag_cloud-3" class="widget widget_tag_cloud">
			<div class="tagcloud">
			<?php wp_tag_cloud($args); ?>
			</div>
			</section>

</aside><!-- #secondary -->
