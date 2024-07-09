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

$args = cmlt_er_recursive_parse_args(
    $args,
    [
    'display' => false,
    'classes' => '',
    ]
);

$display = $args['display'];
$bcn_check = function_exists( 'bcn_display' );

$classes = $args['classes'];
$container_classes = cmlt_er_generate_attr_string( [ 'class' => rtrim( 'breadcrumbs ' . $classes ) ] );

if ( $display && $bcn_check ): ?>
    <div <?php echo $container_classes; ?>>
        <?php bcn_display();?>
    </div>
<?php endif; ?>