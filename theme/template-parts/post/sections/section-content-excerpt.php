<?php
/**
 * Template part for displaying post content in excerpt format
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
        'container' => [
            'classes' => 'flex flex-col gap-2',
        ],
        'excerpt' => [
            'display' => null,
            'content' => '',
            'classes' => '',
        ]
    ]
);

$container_attr = cmlt_er_generate_attr_string( 
    [ 
        'class' => rtrim( 'entry-body ' . $args['container']['classes'] ) 
    ] 
);

?>

<section <?php echo $container_attr; ?>>
    <?php 
        /* Post Excerpt */
        get_template_part( 
            'template-parts/post/components/component', 
            'excerpt', 
            $args['excerpt']
        ); 
    ?>
</section><!--.entry-body -->