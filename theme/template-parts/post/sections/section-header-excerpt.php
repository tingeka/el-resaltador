<?php
/**
 * Template part for displaying post header in excerpt format
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
            'classes' => 'entry-header flex flex-col gap-2',
        ],
        'category' => [
            'display' => null,
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
        ],
    ]
);

$container_attr = cmlt_er_generate_attr_string( 
    [ 
        'class' => $args['container']['classes'] 
    ] 
);

$display_category = !is_null( $args['category']['display'] );

?>

<header <?php echo $container_attr; ?>>
        <?php
            /* Post Category */
            if ( $display_category ) :
                get_template_part( 
                    'template-parts/post/components/component',
                    'category',
                    $args['category']
                );
            endif;
            /* Post Heading */
            get_template_part( 
                'template-parts/post/components/component', 
                'heading', 
                $args['title']
            ); 
        ?>
</header><!--.entry-header -->