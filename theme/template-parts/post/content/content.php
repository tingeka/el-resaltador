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
                'template-parts/post/sections/section', 
                'header-single',
                [
                    'container' => [
                        'classes' => '',
                    ],
                    'wrapper'   => [
                        'classes' => ''
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
                        'classes' => '',
                    ],
                    'excerpt' => [
                        'content' => '',
                        'classes' => '',
                    ],
                    'footer' => [
                        'container' => [
                            'classes'   => '',
                        ],
                        'author' => [
                            'classes'   => '',
                        ],
                        'date' => [
                            'classes' => '',
                        ]
                    ]
                ]
            );
    ?>
    <!-- Post Content -->
    <?php 
        get_template_part( 
            'template-parts/post/sections/section', 
            'content-single', 
            []
        )
    ?>
    <!-- Post Footer -->
    <?php 
        get_template_part( 
            'template-parts/post/sections/section', 
            'footer-single', 
            [
                'container' => [
                    'classes' => '',
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
                        'content' => '',
                        'link'    => '',
                        'classes' => '',
                    ],
                    'bio' => [
                        'content' => '',
                        'classes' => '',
                    ]
                ]
            ]
        )
    ?>
</article><!-- #post-${ID} -->
