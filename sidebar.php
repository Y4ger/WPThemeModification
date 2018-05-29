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
	<h2 class="widget-title">Add A Feature</h2>
	<section id="cat_cloud" class="widget widget_tag_cloud">
		<div class="catcloud">
			<ul class="cat-selector" role="list">
				<?php
				function seoUrl($string) {
			    //Lower case everything
			    $string = strtolower($string);
			    //Make alphanumeric (removes all other characters)
			    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
			    //Clean up multiple dashes or whitespaces
			    $string = preg_replace("/[\s-]+/", " ", $string);
			    //Convert whitespaces and underscore to dash
			    $string = preg_replace("/[\s_]/", "-", $string);
		    return $string;
				}

			 	$thiscat = get_query_var('cat');
				$mycats = get_categories();

				foreach ($mycats as $cat) {
					$name = seoUrl($cat->name);
					if ($name == get_query_var('category_name')){
						echo "<li class='category-selector selected' id=$name>$cat->name</li>";
					} else {
						echo "<li class='category-selector' id=seoUrl$name>$cat->name</li>";
					}
				}

				?>
			</ul>
		</div>
	</section>

	<h2 class="widget-title">Details</h2>
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
