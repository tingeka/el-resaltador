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
get_template_part( 
    'template-parts/post/post-header', 
    'category',
    [
        'ul' => [
            'classes' => $args['category']['ul']['classes'] ?? '',
        ],
        'li' => [
            'classes' => $args['category']['li']['classes'] ?? '',
        ],
        'a' => [
            'classes' => $args['category']['a']['classes'] ?? '',
        ]
    ]
);
get_template_part( 'template-parts/post/post-header', 'heading', [
    'title' => [
        'content' => $args['title']['content'] ?? '',
        'tag'     => $args['title']['tag'] ?? '',
        'link'    => $args['title']['link'] ?? '',
        'classes' => $args['title']['classes'] ?? '',
    ],
] );