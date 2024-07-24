<?php
/**
 * Template part for the name name in author box.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 *
 * Renders the post author name with a link to the author's archive page.
 *
 * @param string $cmlt_er_classes CSS classes to apply to the author name element.
 * @return void
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args,
	array(
		'classes' => 'm-0 text-foreground/70',
	)
);

$cmlt_er_author_name = cmlt_er_posted_by( $cmlt_er_template_part_args['classes'] );

echo $cmlt_er_author_name; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
