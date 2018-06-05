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
	<h2 class="widget-title">Click to combine feature options</h2>
	<section id="cat_cloud" class="widget widget_tag_cloud">
		<div class="catcloud">
			<ul class="cat-selector" role="list">
				<?php
				function is_subcategory ($catid) {
					$cat_data = get_category($catid);
					if ( $cat_data->parent )
						return true;
					else
						return false;
				}
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
				$mycats = get_categories(array(
					'exclude' => '20'
				));

				foreach ($mycats as $cat) {
					if (! is_subcategory($cat)){
						$name = seoUrl($cat->name);
						console.log($cat->ID);
						echo "<li class='category-selector' id=$name>$cat->name</li>";
					}
				}

				?>
			</ul>
		</div>
	</section>

	<h2 class="widget-title">Add Specifics</h2>
	<section id="cat_cloud" class="widget widget_tag_cloud">
		<div class="catcloud">
			<ul class="cat-selector" role="list">
				<?php
					$thiscat = get_query_var('cat');
					$mycats = get_categories();

					foreach ($mycats as $cat) {
						if (is_subcategory($cat)){
							$name = seoUrl($cat->name);
							echo "<li class='category-selector' id=$name>$cat->name</li>";
						}
					}
				?>
			</ul>
		</div>
	</section>


	<!-- <h2 class="widget-title">Details</h2> -->
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
	<!-- <section id="tag_cloud-3" class="widget widget_tag_cloud">
		<div class="tagcloud">
		<?php// wp_tag_cloud($args); ?>
		</div>
	</section> -->
<a href="http://localhost:8888/contact/">	<button class="widget-title" id="contact-button">Contact Us</button></a>
	<?php// dynamic_sidebar('smartslider_area_1'); ?>
</aside><!-- #secondary -->
