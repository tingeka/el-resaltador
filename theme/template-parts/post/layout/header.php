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

$args = wp_parse_args(
    $args,
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
        ],
        'excerpt' => [
            'content' => '',
            'classes' => '',
        ],
        'footer' => [
            'wrapper' => [
                'classes'   => '',
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

?>

<section class="<?php echo $args['container']['classes'] ?>">
    <div class="<?php echo $args['wrapper']['classes'] ?>">
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
        ?>
        <?php if ( $args['excerpt']['content'] !== '' ): ?>
            <p class="<?php echo $args['excerpt']['classes'] ?>">
                <?php echo $args['excerpt']['content']; ?>
            </p>
        <?php endif; ?>

        <div class="<?php echo $args['footer']['container']['classes'] ?>">
            <?php
                get_template_part( 
                    'template-parts/post/components/author', 
                    '',
                    $args['footer']['author']
                );
                get_template_part( 
                    'template-parts/post/components/date', 
                    '',
                    $args['footer']['date']
                );
            ?>
        </div>
    </div>
</section>