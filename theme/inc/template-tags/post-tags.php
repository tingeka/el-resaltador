<?php
/**
 * Template tag for displaying post tags.
 *
 * @param array $classes {
 *     Optional. Array of classes for different elements.
 *
 *     @type string $list      Classes for the <ul> tag.
 *     @type string $wrapper   Classes for the wrapper <div>.
 *     @type string $container Classes for the container <div>.
 * }
 * @return string HTML markup for the post tags.
 */
function cmlt_er_post_tags( $classes = [] ) {

    $container_classes = $classes['container']['classes'] 
    ? esc_attr( $classes['container']['classes'] ) 
    : '';

    $wrapper_classes = $classes['wrapper']['classes'] 
    ? esc_attr( $classes['wrapper']['classes'] ) 
    : '';

    $list_classes = $classes['list']['classes'] 
    ? esc_attr( $classes['list']['classes'] ) 
    : '';

    $item_classes = $classes['item']['classes'] 
    ? esc_attr( $classes['item']['classes'] ) 
    : '';

    // Get tags for the current post
    $tags = get_the_tags();
    if ( ! $tags ) {
        return '';
    }

    // Build the tag links
    $tag_links = [];
    foreach ( $tags as $tag ) {
        $tag_links[] = cmlt_er_content_tag(
            'a',
            $tag->name,
            [
                'href' => esc_url( get_tag_link( $tag->term_id ) ),
            ]
        );
    }

    $tag_list_items = [];
    
    // Loop through each tag link and build list items
    foreach ( $tag_links as $index => $tag_link ) {
        // Determine if this is the last tag link
        $is_last_tag = ( $index === count( $tag_links ) - 1 );

        // Append comma if it's not the last tag link
        $comma_or_empty = $is_last_tag ? '' : ', ';

        // Build the list item with the tag link and comma (if applicable)
        $list_item_content = $tag_link . $comma_or_empty;

        // Create the <li> element with the list item content and classes
        $list_item = cmlt_er_content_tag(
            'li',
            $list_item_content,
            [
                'class' => $item_classes,
            ]
        );

        // Add the created list item to the list of tag list items
        $tag_list_items[] = $list_item;
    }

    $tag_list = cmlt_er_content_tag(
        'ul',
        join( '', $tag_list_items ),
        [
            'class' => $list_classes,
        ]
    );

    $tags_label = cmlt_er_content_tag(
        'span',
         esc_html__( 'Etiquetas: ', 'el-resaltador' ),
         []
     );

    // Wrap the tags list with a wrapper div
    $tags_wrapper = cmlt_er_content_tag(
        'div',
        $tags_label . $tag_list,
        [
            'class' => $wrapper_classes,
        ]
    );

    // Wrap everything in the container div
    $tags_container = cmlt_er_content_tag(
        'div',
        $tags_wrapper,
        [
            'class' => $container_classes,
        ]
    );

    return $tags_container;
}
