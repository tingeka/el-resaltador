<?php
/**
 * Displays an optional post thumbnail, wrapping the post thumbnail in an
 * anchor element except when viewing a single post.
 *
 * @package El_Resaltador
 * @param array $args {
 *     Optional. Arguments to customize the post thumbnail output.
 *
 *     @type array $figure {
 *         Optional. Arguments for the figure element.
 *         @type string $classes Additional CSS classes for the figure element.
 *     }
 *     @type array $link {
 *         Optional. Arguments for the link element.
 *         @type string $classes Additional CSS classes for the link element.
 *     }
 *     @type array $image {
 *         Optional. Arguments for the image element.
 *         @type string $size The image size to use. Default is 'post-thumbnail'.
 *         @type string $classes Additional CSS classes for the image element.
 *     }
 * }
 */

if ( ! function_exists( 'cmlt_er_post_thumbnail' ) ) :
	function cmlt_er_post_thumbnail( $args = array() ) {//phpcs:ignore Squiz.Commenting.FunctionComment.Missing

		$args = cmlt_er_recursive_parse_args(
			$args,
			array(
				'figure' => array(
					'classes' => '',
				),
				'link'   => array(
					'classes' => '',
				),
				'image'  => array(
					'size'    => 'post-thumbnail',
					'classes' => '',
				),
			)
		);

		if ( ! cmlt_er_can_show_post_thumbnail() ) {
			return;
		}

		if ( is_singular() && ! is_front_page() ) :
			echo cmlt_er_content_tag(//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'figure',
				get_the_post_thumbnail(
					get_the_ID(),
					$args['image']['size'],
					array(
						'class' => $args['image']['classes'],
					)
				),
				array(
					'class' => rtrim( 'post-thumbnail ' . $args['figure']['classes'] ),
				)
			);

		else :

			$link = get_the_permalink();

			$link_html = cmlt_er_content_tag(
				'a',
				get_the_post_thumbnail(
					get_the_ID(),
					$args['image']['size'],
					array(
						'class' => rtrim( 'post-thumbnail-image ' . $args['image']['classes'] ),
					)
				),
				array(
					'href'        => $link,
					'class'       => rtrim( 'post-thumbnail-link ' . $args['link']['classes'] ),
					'aria-hidden' => 'true',
					'tabindex'    => '-1',
				)
			);

			$figure = cmlt_er_content_tag(
				'figure',
				$link_html,
				array(
					'class' => rtrim( 'post-thumbnail ' . $args['figure']['classes'] ),
				)
			);

			echo $figure;//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		endif; // End is_singular().
	}

endif;
