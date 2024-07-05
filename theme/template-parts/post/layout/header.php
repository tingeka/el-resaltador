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
        ],
        'excerpt' => [
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

?>

<section <?php echo $container_attr; ?>>
    <div <?php echo $wrapper_attr; ?>>
        <?php
            /* Post Category */
            get_template_part( 
                'template-parts/post/components/category',
                '',
                $args['category']
            );
            /* Post Heading */
            get_template_part( 
                'template-parts/post/components/heading', 
                '', 
                $args['title']
            ); 
            /* Post Excerpt */
            get_template_part( 
                'template-parts/post/components/excerpt', 
                '', 
                $args['excerpt']
            ); 
        ?>
        <div <?php echo $footer_container_attr; ?>">
            <?php
                get_template_part( 
                    'template-parts/post/components/date', 
                    '',
                    $args['footer']['date']
                );
                get_template_part( 
                    'template-parts/post/components/author', 
                    'name',
                    $args['footer']['author']
                );
            ?>
        </div>
    </div>
</section>