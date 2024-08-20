<?php
/**
 * Block Render file
 *
 * This file is responsible for rendering the nota de tapa block in the frontend.
 *
 * @package El_Resaltador
 * @subpackage Gutenberg
 * @since 1.0.0
 */

/**
 * Extracts post IDs from the selected posts attribute.
 *
 * @var array $attributes Block attributes.
 */
$cmlt_er_blocks_nota_de_tapa_post_ids = array_column( $attributes['selectedPosts'], 'id' );


// return early if no posts were selected.
if ( empty( $cmlt_er_blocks_nota_de_tapa_post_ids ) ) {
	return;
}

$cmlt_er_blocks_nota_de_tapa_query_args = array(
	'post_type'      => 'post', // Change to your post type if needed.
	'post__in'       => $cmlt_er_blocks_nota_de_tapa_post_ids,
	'orderby'        => 'post__in', // Ensure the posts are ordered as per the post__in array.
	'posts_per_page' => 3,
	'no_found_rows'  => true,
);

$cmlt_er_blocks_nota_de_tapa_query = new WP_Query( $cmlt_er_blocks_nota_de_tapa_query_args );

?>

<div class="grid grid-cols-1 gap-8 p-4 mt-4 bg-foreground md:grid-cols-2 text-background xl:rounded-md"> 
<?php
if ( $cmlt_er_blocks_nota_de_tapa_query->have_posts() ) :
	while ( $cmlt_er_blocks_nota_de_tapa_query->have_posts() ) :
		$cmlt_er_blocks_nota_de_tapa_query->the_post();
		if ( 0 === $cmlt_er_blocks_nota_de_tapa_query->current_post ) :
			include_once 'partials/partial-nota-primaria.php';
		else :
			include 'partials/partial-nota-secundaria.php';
		endif;
	endwhile;
	// Restore global post data.
	wp_reset_postdata();
endif;
?>
</div> 