<?php
/**
 * Template part for displaying post footer in excerpt format
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
            'classes'   => 'flex gap-2 text-sm',
        ],
        'author' => [
            'classes'   => '',
        ],
        'date' => [
            'classes'   => '',
        ]
    ]
);

$container_attr = cmlt_er_generate_attr_string( 
    [ 
        'class' => $args['container']['classes'] 
    ] 
);


?>

<footer <?php echo $container_attr ?>>
    <?php
        get_template_part( 
            'template-parts/post/components/component', 
            'date',
            $args['date']
        );
        get_template_part( 
            'template-parts/post/components/component', 
            'author-name',
            $args['author']
        );
    ?>
</footer><!--.entry-footer -->