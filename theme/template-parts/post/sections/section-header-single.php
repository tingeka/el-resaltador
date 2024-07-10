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

$args = cmlt_er_recursive_parse_args(
    $args,
    [
        'container' => [
            'classes' => 'flex gap-4 md:gap-8 max-w-xl mx-auto',
        ],
        'wrapper'   => [
            'classes' => 'flex flex-col justify-center w-full gap-4'
        ],
        'breadcrumbs' => [
            'display' => false,
            'classes' => 'py-4 text-sm',
        ],
        'category' => [
            'display' => true,
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
        'excerpt' => [
            'display' => false,
            'content' => '',
            'classes' => '',
        ],
        'footer' => [
            'container' => [
                'classes'   => 'flex gap-2 text-sm',
            ],
            'author' => [
                'content'   => '',
                'link'      => '',
                'classes'   => '',
            ],
            'date' => [
                'classes'   => '',
            ]
        ]
    ]
);

$container_attr = cmlt_er_generate_attr_string( 
    [ 
        'class' => $args['container']['classes'] 
    ] 
);

$wrapper_attr = cmlt_er_generate_attr_string( 
    [ 
        'class' => $args['wrapper']['classes'] 
    ] 
);

$footer_container_attr = cmlt_er_generate_attr_string( 
    [ 
        'class' => $args['footer']['container']['classes'] 
    ] 
);

$show_breadcrumbs = $args['breadcrumbs']['display'];

?>

<section <?php echo $container_attr; ?>>
    <div <?php echo $wrapper_attr; ?>>
        <?php
            if ( $show_breadcrumbs ):
                get_template_part( 'template-parts/global/components/component', 'breadcrumbs', $args['breadcrumbs'] );
            endif;
            /* Post Category */
            get_template_part( 
                'template-parts/post/components/component',
                'category',
                $args['category']
            );
            /* Post Heading */
            get_template_part( 
                'template-parts/post/components/component', 
                'heading', 
                $args['title']
            ); 
            /* Post Excerpt */
            get_template_part( 
                'template-parts/post/components/component', 
                'excerpt', 
                $args['excerpt']
            ); 
        ?>
        <div <?php echo $footer_container_attr; ?>">
            <?php
                get_template_part( 
                    'template-parts/post/components/component', 
                    'date',
                    $args['footer']['date']
                );
                get_template_part( 
                    'template-parts/post/components/component', 
                    'author-name',
                    $args['footer']['author']
                );
            ?>
        </div>
    </div>
</section>