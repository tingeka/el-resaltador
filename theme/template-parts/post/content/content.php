<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'px-4'); ?>>
    <!-- Post Header -->
    <?php
        get_template_part( 
                'template-parts/post/layout/header', 
                '',
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
                        'content' => get_the_title(),
                        'tag'     => 'h1',
                        'link'    => '',
                        'classes' => 'entry-title m-0',
                    ],
                    'excerpt' => [
                        'content' => has_excerpt() ? get_the_excerpt() : '',
                        'classes' => 'm-0 text-lg',
                    ],
                    'footer' => [
                        'container' => [
                            'classes'   => 'flex gap-2 text-sm',
                        ],
                        'author' => [
                            'content'            => get_the_author_meta( 'display_name' ),
                            'link'            => get_author_posts_url( get_the_author_meta( 'ID' ) ),
                            'classes'         => 'm-0 text-foreground/70',
                        ],
                        'date' => [
                            'classes' => 'text-foreground/70',
                        ]
                    ]
                ]
            );
    ?>
    <!-- Post Content -->
    <?php 
        get_template_part( 'template-parts/post/layout/content', '', [])
    ?>
    <!-- Post Footer -->
    <?php 
        get_template_part( 
            'template-parts/post/layout/footer', 
            '', 
            [
                'container' => [
                    'classes' => 'max-w-[50rem] mx-auto py-8 flex flex-col gap-8',
                ],
                'tags' => [
                    'content' => get_the_tags(),
                    'container'     => [
                        'classes' => 'w-full mx-auto'
                    ],
                    'wrapper'       => [
                        'classes' => 'w-full max-w-xl mx-auto flex gap-1 py-8 border-y'
                    ],
                    'list'          => [
                        'classes' => 'flex flex-wrap gap-0.5'
                    ],
                    'item'          => [
                        'classes' => 'font-semibold underline'
                    ]
                ],
                'author-box' => [
                    'container' => [
                        'classes' => 'w-full max-w-xl mx-auto'
                    ],
                    'wrapper' => [
                        'classes' => 'py-8 px-4 border rounded flex flex-col items-center text-center gap-4'
                    ],
                    'image'     => [
                        'display' => false,
                        'content' => '',
                        'classes' => '',
                    ],
                    'name'      => [
                        'display' => true,
                        'content' => get_the_author_meta( 'display_name' ),
                        'link'    => get_author_posts_url( get_the_author_meta( 'ID' ) ),
                        'classes' => 'm-0 font-semibold',
                    ],
                    'bio' => [
                        'display' => true,
                        'content' => get_the_author_meta( 'description' ),
                        'classes' => '',
                    ]
                ]
            ]
        )
    ?>
</article><!-- #post-${ID} -->
