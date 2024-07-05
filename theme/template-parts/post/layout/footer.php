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
$args = wp_parse_args(
    $args,
    [
        'container' => [
            'classes' => ''
        ],
        'tags' => [
            'content'       => [],
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
                'display' => null,
                'content' => '',
                'classes' => '',
            ],
            'name'      => [
                'display' => null,
                'content' => '',
                'link'    => '',
                'classes' => '',
            ],
            'bio' => [
                'display' => null,
                'content' => '',
                'classes' => '',
            ]
        ]
    ]
);


?>

<div class="<?php echo $args['container']['classes'] ?>">
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
                'template-parts/global/components/component-listing', 
                'title-only', 
                [
                    'title' => [
                        'content' => 'Últimas',
                    ],
                    'listing' => [
                        'container' => [
                            'classes' => 'py-4 my-0 relative'
                        ],
                        'wrapper'     => [
                            'classes' => 'flex flex-col gap-4'
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