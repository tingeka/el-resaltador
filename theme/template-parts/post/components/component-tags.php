<?php
/**
 * Template part for displaying post tags
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
        'container'     => [
            'classes' => 'w-full mx-auto'
        ],
        'wrapper'       => [
            'classes' => 'flex flex-wrap w-full max-w-xl mx-auto flex gap-1 py-8 border-y'
        ],
        'list'          => [
            'classes' => 'flex flex-wrap gap-0.5'
        ],
        'item'          => [
            'classes' => 'font-semibold underline'
        ]
    ],
);

echo cmlt_er_post_tags( $args );

?>


