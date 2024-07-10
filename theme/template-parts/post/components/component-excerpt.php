<?php
/**
 * Template part for displaying post excerpt
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
        'display' => true,
        'content' => get_the_excerpt(),
        'classes' => 'm-0 text-lg',
    ]
);

if ( $args['display'] ) {
    
    $excerpt_content = $args['content'] !== '' 
    ? cmlt_er_content_tag( 
        'p', 
        esc_html( $args['content'] ),
        [ 
            'class' => $args['classes'] 
        ] 
        )
    : '';

    echo $excerpt_content;

}

?>