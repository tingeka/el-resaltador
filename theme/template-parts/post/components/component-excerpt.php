<?php
/**
 * Template part for displaying post excerpt
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args ?? array(),
	array(
		'display' => true,
		'content' => get_the_excerpt(),
		'classes' => 'm-0 text-lg',
	)
);

$cmlt_er_content = $cmlt_er_template_part_args['content'];

if ( $cmlt_er_template_part_args['display'] ) {

	echo cmlt_er_content_tag( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		'p',
		$cmlt_er_content,
		array(
			'class' => $cmlt_er_template_part_args['classes'],
		)
	);
}
