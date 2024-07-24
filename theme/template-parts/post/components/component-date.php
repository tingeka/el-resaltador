<?php
/**
 * Template part for post footer date
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args,
	array(
		'classes' => 'text-foreground/70',
	)
);

$cmlt_er_classes = $cmlt_er_template_part_args['classes'];

echo cmlt_er_posted_on( $cmlt_er_classes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
