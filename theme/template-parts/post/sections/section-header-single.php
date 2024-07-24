<?php
/**
 * Template part for displaying post header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args,
	array(
		'container'   => array(
			'classes' => 'flex gap-4 md:gap-8 max-w-xl mx-auto',
		),
		'wrapper'     => array(
			'classes' => 'flex flex-col justify-center w-full gap-4',
		),
		'breadcrumbs' => array(
			'display' => false,
			'classes' => 'py-4 text-sm',
		),
		'category'    => array(
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
		'title'       => array(
			'content' => '',
			'tag'     => '',
			'link'    => '',
		),
		'excerpt'     => array(
			'display' => false,
			'content' => '',
			'classes' => '',
		),
		'footer'      => array(
			'container' => array(
				'classes' => 'flex gap-2 text-sm',
			),
			'author'    => array(
				'content' => '',
				'link'    => '',
				'classes' => '',
			),
			'date'      => array(
				'classes' => '',
			),
		),
	)
);

$cmlt_er_container_attr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['container']['classes'],
	)
);

$cmlt_er_wrapper_attr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['wrapper']['classes'],
	)
);

$cmlt_er_footer_container_attr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['footer']['container']['classes'],
	)
);

$cmlt_er_show_breadcrumbs = $cmlt_er_template_part_args['breadcrumbs']['display'];

?>

<section <?php echo $cmlt_er_container_attr; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div <?php echo $cmlt_er_wrapper_attr; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
		if ( $cmlt_er_show_breadcrumbs ) :
			get_template_part( 'template-parts/global/components/component', 'breadcrumbs', $cmlt_er_template_part_args['breadcrumbs'] );
			endif;
			/* Post Category */
			get_template_part(
				'template-parts/post/components/component',
				'category',
				$cmlt_er_template_part_args['category']
			);
			/* Post Heading */
			get_template_part(
				'template-parts/post/components/component',
				'heading',
				$cmlt_er_template_part_args['title']
			);
			/* Post Excerpt */
			get_template_part(
				'template-parts/post/components/component',
				'excerpt',
				$cmlt_er_template_part_args['excerpt']
			);
			?>
		<div <?php echo $cmlt_er_footer_container_attr; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">
			<?php
				get_template_part(
					'template-parts/post/components/component',
					'date',
					$cmlt_er_template_part_args['footer']['date']
				);
				get_template_part(
					'template-parts/post/components/component',
					'author-name',
					$cmlt_er_template_part_args['footer']['author']
				);
				?>
		</div>
	</div>
</section>