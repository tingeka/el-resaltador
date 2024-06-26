<?php
/**
 * Template part for displaying post header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

 ?>

<?php

$args = wp_parse_args(
    $args,
    [
        'category' => [
            'ul' => [
                'classes' => '',
            ],
            'li' => [
                'classes' => '',
            ],
            'a' => [
                'classes' => '',
            ],
        ],
        'title' => [
            'content' => '',
            'tag'     => '',
            'link'    => '',
            'classes' => '',
        ]
    ]
);

get_template_part( 
    'template-parts/post/post-header', 
    'category',
    $args['category'],
);
get_template_part( 
    'template-parts/post/post-header', 
    'heading', 
    $args['title']
);