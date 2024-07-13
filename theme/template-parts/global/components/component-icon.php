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

$args = cmlt_er_recursive_parse_args(
    $args,
    [
        'type' => '',
        'name' => '',
        'id' => '',
        'size' => '',
        'classes' => '',
    ]
);

$icon_type = $args['type'];
$icon_name = $args['name'];
$icon_id = $args['id'];
$icon_size = $args['size'];
$icon_classes = $args['classes'];

$icon_prefix = 'fa';
$icon_name_prefixed = $icon_prefix . '-' . $icon_name;
$icon_type_prefixed = $icon_prefix . '-' . $icon_type;
$icon_size_prefixed = $icon_size ? $icon_prefix. '-'. $icon_size : '';

$icon_classes = rtrim(
    implode(
        ' ', 
        [ 
            'fa-icon',
            $icon_name_prefixed, 
            $icon_type_prefixed,
            $icon_size_prefixed, 
            $args[ 'classes' ] 
        ] 
    )
);

$icon_attr = cmlt_er_generate_attr_string(
    [
        'class' => $icon_classes,
        'aria-hidden' => 'true',
        'focusable' => 'false',
        'role' => 'img',
    ]
);

// Construct the path to the SVG file
$icon_path = get_template_directory() . '/assets/icons/' . $icon_type . '/' . $icon_name . '.svg';

// Check if the file exists before trying to include it
if ( file_exists( $icon_path ) ) {
    // Output the SVG content directly
    // Read SVG content
    $svg_content = file_get_contents($icon_path);

    // Add additional attributes
    $svg_content = str_replace('<svg', '<svg ' . $icon_attr, $svg_content);

    // Output the modified SVG content
    echo $svg_content;
}