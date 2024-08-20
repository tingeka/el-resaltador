<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<?php

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args ?? array(),
	array(
		'container' => array(
			'classes' => 'flex flex-col md:flex-row gap-8 max-w-screen-xl mx-auto my-8',
		),
		'thumbnail' => array(
			'container' => array(
				'classes' => 'w-full shrink-0 md:w-80 md:aspect-video',
			),
			'figure'    => array(
				'classes' => '',
			),
			'link'      => array(
				'classes' => 'flex w-full aspect-video',
			),
			'image'     => array(
				'size'    => 'large',
				'classes' => 'object-cover',
			),
		),
		'content'   => array(
			'container' => array(
				'classes' => 'flex flex-col gap-4 w-full grow',
			),
			'header'    => array(
				'container' => array(
					'classes' => '',
				),
				'category'  => array(
					'mode'    => 'light',
					'display' => true,
					'ul'      => array(
						'classes' => '',
					),
					'li'      => array(
						'classes' => '',
					),
					'a'       => array(
						'classes' => '',
					),
				),
				'title'     => array(
					'content' => '',
					'tag'     => '',
					'link'    => '',
					'classes' => '',
				),
			),
			'body'      => array(
				'container' => array(
					'classes' => '',
				),
				'excerpt'   => array(
					'display' => true,
					'content' => '',
					'classes' => '',
				),
			),
			'footer'    => array(
				'container' => array(
					'classes' => '',
				),
				'author'    => array(
					'classes' => '',
				),
				'date'      => array(
					'classes' => '',
				),
			),
		),
	)
);

$cmlt_er_container_attr = $cmlt_er_template_part_args['container']['classes'];

$cmlt_er_thumbnail_container_attr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['thumbnail']['container']['classes'],
	)
);

$cmlt_er_content_container_atrr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['content']['container']['classes'],
	)
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $cmlt_er_container_attr ); ?>>
	<section <?php echo $cmlt_er_thumbnail_container_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
			/* Post Thumbnail */
			$cmlt_er_post_thumbnail_params = $cmlt_er_template_part_args['thumbnail'];
			unset( $cmlt_er_post_thumbnail_params['container'] );
			cmlt_er_post_thumbnail( $cmlt_er_post_thumbnail_params );
		?>
	</section>
	<section <?php echo $cmlt_er_content_container_atrr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
			/* Post Header */

			get_template_part(
				'template-parts/post/sections/section',
				'header-excerpt',
				$cmlt_er_template_part_args['content']['header']
			);
			/* Post Body */
			get_template_part(
				'template-parts/post/sections/section',
				'content-excerpt',
				$cmlt_er_template_part_args['content']['body']
			);
			/* Post Footer */
			get_template_part(
				'template-parts/post/sections/section',
				'footer-excerpt',
				$cmlt_er_template_part_args['content']['footer']
			);
			?>
	</section>
</article><!-- #post-${ID} -->
