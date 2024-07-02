<?php
/**
 * Template part for post footer author box
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
);
?>

<div class="<?php echo $args['container']['classes'] ?>">
    <div class="<?php echo $args['wrapper']['classes'] ?>">
        <?php
            get_template_part('template-parts/post/components/author', 'image', $args['image'] );
            get_template_part('template-parts/post/components/author', 'name', $args['name'] );
            get_template_part('template-parts/post/components/author', 'bio', $args['bio'] ); 
        ?>
    </div>
</div>