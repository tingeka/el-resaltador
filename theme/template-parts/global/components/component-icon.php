<?php
/**
 * Template part for Icon component
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
		'type'    => '',
		'name'    => '',
		'id'      => '',
		'size'    => '',
		'classes' => '',
	)
);

$cmlt_er_icon_type    = $cmlt_er_template_part_args['type'];
$cmlt_er_icon_name    = $cmlt_er_template_part_args['name'];
$cmlt_er_icon_id      = $cmlt_er_template_part_args['id'];
$cmlt_er_icon_size    = $cmlt_er_template_part_args['size'];
$cmlt_er_icon_classes = $cmlt_er_template_part_args['classes'];

$cmlt_er_icon_prefix        = 'fa';
$cmlt_er_icon_name_prefixed = $cmlt_er_icon_prefix . '-' . $cmlt_er_icon_name;
$cmlt_er_icon_type_prefixed = $cmlt_er_icon_prefix . '-' . $cmlt_er_icon_type;
$cmlt_er_icon_size_prefixed = $cmlt_er_icon_size ? $cmlt_er_icon_prefix . '-' . $cmlt_er_icon_size : '';

$cmlt_er_icon_classes = rtrim(
	implode(
		' ',
		array(
			'fa-icon',
			$cmlt_er_icon_name_prefixed,
			$cmlt_er_icon_type_prefixed,
			$cmlt_er_icon_size_prefixed,
			$cmlt_er_template_part_args['classes'],
		)
	)
);

$cmlt_er_icon_attr = cmlt_er_generate_attr_string(
	array(
		'class'       => $cmlt_er_icon_classes,
		'aria-hidden' => 'true',
		'focusable'   => 'false',
		'role'        => 'img',
	)
);

// Construct the path to the SVG file.
$cmlt_er_icon_path = get_template_directory() . '/assets/icons/' . $cmlt_er_icon_type . '/' . $cmlt_er_icon_name . '.svg';

// Check if the file exists before trying to include it.
if ( file_exists( $cmlt_er_icon_path ) ) {
	// Output the SVG content directly.
	// Read SVG content.
	$cmlt_er_svg_content = file_get_contents( $cmlt_er_icon_path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

	// Add additional attributes.
	$cmlt_er_svg_content = str_replace( '<svg', '<svg ' . $cmlt_er_icon_attr, $cmlt_er_svg_content );

	// Output the modified SVG content.
	echo $cmlt_er_svg_content;// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}