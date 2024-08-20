<?php
/**
 * Template part for post footer author bio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args ?? array(),
	array(
		'classes' => '',
	)
);

$cmlt_er_content = get_the_author_meta( 'description' );
$cmlt_er_classes = $cmlt_er_template_part_args['classes'];

echo cmlt_er_content_tag( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'p',
	esc_html( $cmlt_er_content ),
	array(
		'class' => $cmlt_er_classes,
	)
);
