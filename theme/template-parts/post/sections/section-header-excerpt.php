<?php
/**
 * Template part for displaying post header in excerpt format
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
			'classes' => 'entry-header flex flex-col gap-2',
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
	)
);

$cmlt_er_container_attr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['container']['classes'],
	)
);

$cmlt_er_display_category = $cmlt_er_template_part_args['category']['display'];

?>

<header <?php echo $cmlt_er_container_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
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
			?>
</header><!--.entry-header -->