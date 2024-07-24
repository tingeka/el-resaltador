<?php
/**
 * Template part for displaying post tags
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args,
	array(
		'container' => array(
			'classes' => 'w-full mx-auto',
		),
		'wrapper'   => array(
			'classes' => 'flex flex-wrap w-full max-w-xl mx-auto flex gap-1 py-8 border-y',
		),
		'list'      => array(
			'classes' => 'flex flex-wrap gap-0.5',
		),
		'item'      => array(
			'classes' => 'font-semibold underline',
		),
	),
);

echo cmlt_er_post_tags( $cmlt_er_template_part_args ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
