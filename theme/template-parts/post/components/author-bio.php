<?php
/**
 * Template part for post footer author bio
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
        'classes' => '',
    ]
);

$content = get_the_author_meta( 'description' );
$classes = $args['classes'];

echo cmlt_er_content_tag(
    'p',
    esc_html( $content ),
    [
        'class' => $classes
    ]
)

?>