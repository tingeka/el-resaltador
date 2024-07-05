<?php
/**
 * Retrieves the latest posts of a specified post type.
 *
 * @param string $post_type The post type to retrieve. Defaults to 'post'.
 * @param int $amount The number of posts to retrieve. Defaults to 10.
 * @param int|null $exclude The ID of the post to exclude from the results. Defaults to null.
 * @return array An array of post objects.
 */
function cmlt_er_get_latest_posts( $post_type = 'post', $amount = 10, $exclude = null ) {
    
    $posts = array();

    $args = array(
        'post_type'            => $post_type,
        'posts_per_page'       => $amount,
        'post_status'          => 'publish',
        'ignore_sticky_posts'  => true,
        'no_found_rows'        => true,
    );

    $recent_posts = new WP_Query( $args );

    $current_post_id = $exclude; // This assumes $exclude is the current post ID to be excluded

    while ( $recent_posts->have_posts() ) {
        $recent_posts->the_post();

        if ( get_the_ID() !== $current_post_id ) {
            $posts[] = $recent_posts->post; // Add the whole post object
        }
    }

    wp_reset_postdata();

    return $posts;
}
