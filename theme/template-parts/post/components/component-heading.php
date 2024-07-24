<?php
/**
 * Template part for displaying post header
 *
 * Renders the post header content, optionally wrapped in a link.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 *
 * @param array $cmlt_er_template_part_args {
 *     Optional. Arguments to customize the post header output.
 *
 *     @type string $content The post header content.
 *     @type string $tag     The HTML tag to use for the post header.
 *     @type string $link    The URL to link the post header to.
 *     @type string $classes Additional CSS classes to apply to the post header.
 * }
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args,
	array(
		'content' => get_the_title(),
		'tag'     => 'h1',
		'link'    => '',
		'classes' => 'm-0',
	)
);

$cmlt_er_content  = esc_html( $cmlt_er_template_part_args['content'] );
$cmlt_er_html_tag = $cmlt_er_template_part_args['tag'];
$cmlt_er_url      = $cmlt_er_template_part_args['link'];
$cmlt_er_classes  = $cmlt_er_template_part_args['classes'];

$cmlt_er_title_html = cmlt_er_content_tag(
	$cmlt_er_html_tag,
	$cmlt_er_content,
	array(
		'class' => rtrim( 'entry-title ' . $cmlt_er_classes ),
	)
);

$cmlt_er_link_html = cmlt_er_content_tag(
	'a',
	$cmlt_er_title_html,
	array(
		'href' => $cmlt_er_url,
	)
);

$cmlt_er_output = $cmlt_er_template_part_args['link'] ? $cmlt_er_link_html : $cmlt_er_title_html;

echo $cmlt_er_output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
