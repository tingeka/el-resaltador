<?php
/**
 * Template part for displaying post archives and search results
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
            'classes' => 'flex flex-col md:flex-row gap-8 max-w-screen-xl mx-auto my-8',
        ],
        'thumbnail' => [
            'container' => [
                'classes' => 'w-full shrink-0 md:w-80 md:aspect-video',
            ],
            'figure' => [
                'classes' => ''
            ],
            'link' => [
                'classes' => 'flex w-full aspect-video'
            ],
            'image' => [
                'size' => 'large',
                'classes' => 'object-cover'
            ]
        ],
        'content' => [
            'container' => [
                'classes' => 'flex flex-col gap-4 w-full grow',
            ],
            'header' => [
                'container' => [
                    'classes' => '',
                ],
                'category' => [
                    'mode' => 'light',
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
                    'classes' => '',
                ],
            ],
            'body' => [
                'container' => [
                    'classes' => ''
                ],
                'excerpt' => [
                    'display' => true,
                    'content' => '',
                    'classes' => '',
                ],
            ],
            'footer' => [
                'container' => [
                    'classes'   => '',
                ],
                'author' => [
                    'classes'   => '',
                ],
                'date' => [
                    'classes'   => '',
                ]
            ]
        ]
    ]
);

$container_atrr = $args['container']['classes'];

$thumbnail_container_attr = cmlt_er_generate_attr_string(
    [
        'class' => $args['thumbnail']['container']['classes']
    ]
);

$content_container_atrr = cmlt_er_generate_attr_string(
    [
        'class' => $args['content']['container']['classes']
    ]
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $container_atrr ); ?>>
    <section <?php echo $thumbnail_container_attr; ?>>
        <?php
            /* Post Thumbnail */
            $post_thumbnail_params = $args['thumbnail'];
            unset( $post_thumbnail_params['container'] );
            cmlt_er_post_thumbnail( $post_thumbnail_params );
        ?>
    </section>
    <section <?php echo $content_container_atrr; ?>>
        <?php
            /* Post Header */
            
            get_template_part( 
                'template-parts/post/sections/section', 
                'header-excerpt', 
                $args['content']['header']
            );
            /* Post Body */
            get_template_part( 
                'template-parts/post/sections/section', 
                'content-excerpt', 
                $args['content']['body']
            ); 
            /* Post Footer */
            get_template_part( 
                'template-parts/post/sections/section', 
                'footer-excerpt', 
                $args['content']['footer']
            );
        ?>
    </section>
</article><!-- #post-${ID} -->
