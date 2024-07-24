<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>
<?php do_action( 'cmlt_er_action_post_before_content' ); ?>
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
                    'breadcrumbs' => [
                        'display' => true,
                        'classes' => ''
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
                        'classes' => '',
                    ],
                    'excerpt' => [
                        'display' => false,
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
<?php do_action( 'cmlt_er_action_post_after_content' ); ?>
