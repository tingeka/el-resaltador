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
 * @param string $classes CSS classes to apply to the author name element.
 * @return void
 * 
 */
?>

<?php

$args = cmlt_er_recursive_parse_args(
    $args,
    [
        'classes' => 'm-0 text-foreground/70',
    ]
);

$author_name = cmlt_er_posted_by( $args['classes'] );

echo $author_name;

?>