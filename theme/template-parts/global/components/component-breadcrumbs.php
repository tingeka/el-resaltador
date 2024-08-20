<?php
/**
 * Template part for breadcrumbs template
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
		'display' => false,
		'classes' => '',
	)
);

$cmlt_er_display   = $cmlt_er_template_part_args['display'];
$cmlt_er_bcn_check = function_exists( 'bcn_display' );

$cmlt_er_classes           = $cmlt_er_template_part_args['classes'];
$cmlt_er_container_classes = cmlt_er_generate_attr_string( array( 'class' => rtrim( 'breadcrumbs ' . $cmlt_er_classes ) ) );

if ( $cmlt_er_display && $cmlt_er_bcn_check ) :
	?>
	<div <?php echo $cmlt_er_container_classes;//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
		// Check if the `bcn_display()` function exists before calling it.
		// This prevents runtime errors if the function is not defined,
		// which is useful when the function is provided by an external plugin.
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		}
		?>
	</div>
<?php endif; ?>