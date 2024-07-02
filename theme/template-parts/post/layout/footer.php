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

</div>