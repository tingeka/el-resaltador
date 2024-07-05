<?php
/**
 * Template part for post footer
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
            'classes' => 'max-w-[50rem] mx-auto flex flex-col gap-8'
        ],
        'tags' => [
            'container'     => [
                'classes' => ''
            ],
            'wrapper'       => [
                'classes' => ''
            ],
            'list'          => [
                'classes' => ''
            ],
            'item'          => [
                'classes' => ''
            ]
        ],
        'author-box' => [
            'container' => [
                'classes' => ''
            ],
            'wrapper' => [
                'classes' => ''
            ],
            'image'     => [
                'content' => '',
                'classes' => '',
            ],
            'name'      => [
                'classes' => '',
            ],
            'bio' => [
                'classes' => '',
            ]
        ]
    ]
);

$container_attr = cmlt_er_generate_attr_string( 
    [
        'class' => $args['container']['classes']
    ]
);

?>

<div <?php echo $container_attr ?>">
        <!-- Post Tags  -->
        <?php 
            get_template_part( 
                'template-parts/post/components/tags', 
                '', 
                $args['tags']
            )
        ?>
        <!-- Post Author Box -->
        <?php
            get_template_part( 
                'template-parts/post/components/author', 
                'box', 
                $args['author-box']
            )
        ?>
        <!-- Latests Posts -->
        <?php
            $latests_posts = cmlt_er_get_latest_posts( 'post', 5, get_queried_object_id() );
            $latests_posts_data = [];
            foreach ( $latests_posts as $post ) {
                $latests_posts_data[] = [
                    'content' => $post->post_title,
                    'link' => get_the_permalink( $post->ID )
                ];
            }
            get_template_part( 
                'template-parts/global/components/component', 
                'listing-title-only', 
                [
                    'title' => [
                        'content' => 'Últimas',
                    ],
                    'listing' => [
                        'container' => [
                            'classes' => 'my-0 relative'
                        ],
                        'wrapper'     => [
                            'classes' => 'flex flex-col'
                        ],
                        'items'      => [
                            'classes' => 'relative py-4 text-xl font-semibold after-title-gradient',
                            'data' => $latests_posts_data
                        ],
                    ]
                ]
            )    
        ?>
</div>