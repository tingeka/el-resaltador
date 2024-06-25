<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<?php
$post_ids = array_column( $attributes['selectedPosts'], 'id' );

// return early if no posts were selected
if (empty($post_ids)) return;

$args = array(
    'post_type' => 'post', // Change to your post type if needed
    'post__in' => $post_ids,
	'orderby' => 'post__in', // Ensure the posts are ordered as per the post__in array
    'posts_per_page' => 3,
	'no_found_rows' => true,
);

$query = new WP_Query($args);

?>

<div class="grid grid-cols-1 gap-8 p-4 mt-4 bg-foreground md:grid-cols-2 text-background xl:rounded-md"> 
<?php if ($query->have_posts()):
    while ($query->have_posts()):		
		$query->the_post();
		if ($query->current_post === 0):
			include_once('partials/partial-nota-primaria.php');
		else:
			include('partials/partial-nota-secundaria.php');
		endif;
    endwhile;
    // Restore global post data
    wp_reset_postdata();
else:
    // No posts found
endif;
?>
</div> 