<?php
/**
 * Post tags
 *
 * This file generates the HTML output for post tags.
 *
 * @package El_Resaltador
 * @since 1.0.0
 */

/**
 * Template tag for displaying post tags.
 *
 * @package El_Resaltador
 * @param array $classes {
 *     Optional. Array of classes for different elements.
 *
 *     @type string $list      Classes for the <ul> tag.
 *     @type string $wrapper   Classes for the wrapper <div>.
 *     @type string $container Classes for the container <div>.
 * }
 * @return string HTML markup for the post tags.
 */
function cmlt_er_post_tags( $classes = array() ) {

	$container_classes = $classes['container']['classes']
	? $classes['container']['classes']
	: '';

	$wrapper_classes = $classes['wrapper']['classes']
	? $classes['wrapper']['classes']
	: '';

	$list_classes = $classes['list']['classes']
	? $classes['list']['classes']
	: '';

	$item_classes = $classes['item']['classes']
	? $classes['item']['classes']
	: '';

	// Get tags for the current post.
	$tags = get_the_tags();

	if ( ! $tags ) {
		return '';
	}

	// Build the tag links.
	$tag_links = array();
	foreach ( $tags as $tag ) {
		$tag_links[] = cmlt_er_content_tag(
			'a',
			esc_html( $tag->name ),
			array(
				'href' => get_tag_link( $tag->term_id ),
			)
		);
	}

	$tag_list_items = array();

	// Loop through each tag link and build list items.
	foreach ( $tag_links as $index => $tag_link ) {
		// Determine if this is the last tag link.
		$is_last_tag = ( count( $tag_links ) - 1 === $index );

		// Append comma if it's not the last tag link.
		$comma_or_empty = $is_last_tag ? '' : ', ';

		// Build the list item with the tag link and comma (if applicable).
		$list_item_content = $tag_link . $comma_or_empty;

		// Create the <li> element with the list item content and classes.
		$list_item = cmlt_er_content_tag(
			'li',
			$list_item_content,
			array(
				'class' => $item_classes,
			)
		);

		// Add the created list item to the list of tag list items.
		$tag_list_items[] = $list_item;
	}

	$tag_list = cmlt_er_content_tag(
		'ul',
		join( '', $tag_list_items ),
		array(
			'class' => $list_classes,
		)
	);

	$tags_label = cmlt_er_content_tag(
		'span',
		esc_html__( 'Etiquetas: ', 'el-resaltador' ),
		array()
	);

	// Wrap the tags list with a wrapper div.
	$tags_wrapper = cmlt_er_content_tag(
		'div',
		$tags_label . $tag_list,
		array(
			'class' => $wrapper_classes,
		)
	);

	// Wrap everything in the container div.
	$tags_container = cmlt_er_content_tag(
		'div',
		$tags_wrapper,
		array(
			'class' => $container_classes,
		)
	);

	return $tags_container;
}
