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
            'header' => [
                'category' => [
                    'container' => [
                        'classes' => ''
                    ],
                    'wrapper' => [
                        'classes' => ''
                    ],
                    'list' => [
                        'classes' => ''
                    ],
                    'item' => [
                        'classes' => ''
                    ]
                ],
                'title' => [
                    'container' => [
                        'classes' => ''
                    ],
                    'wrapper' => [
                        'classes' => ''
                    ],
                    'list' => [
                        'classes' => ''
                    ],
                    'item' => [
                        'classes' => ''
                    ]
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
    );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'flex flex-col md:flex-row gap-8 max-w-screen-xl mx-auto my-8'); ?>>
    <section class="w-full shrink-0 md:w-80 md:aspect-video">
        <?php 
            cmlt_er_post_thumbnail( 
                [
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
                ] 
            ); 
        ?>
    </section>
    <section class="flex flex-col gap-4 w-full grow">
        <?php
            /* Post Header */
            get_template_part( 
                'template-parts/post/sections/section', 
                'header-excerpt', 
                $args['header']
            );
            /* Post Body */
            get_template_part( 
                'template-parts/post/sections/section', 
                'content-excerpt', 
                $args['body']
            ); 
            /* Post Footer */
            get_template_part( 
                'template-parts/post/sections/section', 
                'footer-excerpt', 
                $args['footer']
            );
        ?>
    </section>
</article><!-- #post-${ID} -->
