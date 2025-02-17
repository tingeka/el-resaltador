<?php
/**
 * Renders a list of posts with optional customization.
 *
 * @package El_Resaltador
 * @param array $args Optional. Array of arguments for customizing the component.
 *   - container['classes']: CSS classes to apply to the container div.
 *   - wrapper['classes']: CSS classes to apply to the wrapper ul.
 *   - items['tag']: HTML tag to use for each list item (h1, h2, etc).
 *   - items['classes']: CSS classes to apply to each list item.
 *   - items['data']: Array of post data, with 'content' and 'link' keys.
 * @return string Generated HTML for the latest posts component.
 */

if ( ! function_exists( 'cmlt_er_post_list' ) ) :
	function cmlt_er_post_list( $args = array() ) {// phpcs:ignore Squiz.Commenting.FunctionComment.Missing
		// Extract specific keys from $args or initialize as empty arrays.
		$items_container_classes = isset( $args['container']['classes'] )
		? $args['container']['classes']
		: '';

		$items_wrapper_classes = isset( $args['wrapper']['classes'] )
		? $args['wrapper']['classes']
		: '';

		$items_tag = isset( $args['items']['tag'] )
		? $args['items']['tag']
		: '';

		$items_classes = isset( $args['items']['classes'] )
		? $args['items']['classes']
		: '';

		$items_data = isset( $args['items']['data'] )
		? $args['items']['data']
		: array();

		// Bail if no items.
		if ( empty( $items_data ) ) {
			return '';
		}

		// Prepare Items HTML.
		$items_html = '';

		foreach ( $items_data as $item ) {
			$item_content = ! empty( $item['link'] )
				? cmlt_er_content_tag(
					'a',
					cmlt_er_content_tag(
						$items_tag,
						esc_html( $item['content'] ),
						array()
					),
					array(
						'href' => $item['link'],
					)
				)
				: cmlt_er_content_tag(
					$items_tag,
					esc_html( $item['content'] ),
					array()
				);

			$item_html   = cmlt_er_content_tag(
				'li',
				$item_content,
				array(
					'class' => $items_classes,
				)
			);
			$items_html .= $item_html;
		}

		// Prepare Items Wrapper HTML.
		$items_wrapper_html = cmlt_er_content_tag(
			'ul',
			$items_html,
			array(
				'class' => $items_wrapper_classes,
			)
		);

		// Prepare Items Container HTML.
		$items_container_html = cmlt_er_content_tag(
			'div',
			$items_wrapper_html,
			array(
				'class' => $items_container_classes,
			)
		);

		// Return the component HTML.
		return $items_container_html;
	}
endif;
