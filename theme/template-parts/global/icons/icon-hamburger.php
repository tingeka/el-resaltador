<?php
/**
 * Template part for Icon Hamburger
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
        'classes' => 'fill-foreground'
    ]
);

$classes = cmlt_er_generate_attr_string( 
    [
    'class' => $args['classes']
    ] 
);

?>
<?php // I should go back here and deal with the attrs like ARIA and stuff, probably passing args, idk ?>
<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14" <?php echo $classes; ?>>
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
</svg>