<?php
/**
 * Template part for post single category
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
        'ul' => [
            'classes' => '',
        ],
        'li' => [
            'classes' => '',
        ],
        'a' => [
            'classes' => '',
        ]
    ]
);
?>

<ul class="m-0 p-0 list-none font-mono <?php echo $args['ul']['classes'] ?>">
    <li class="p-0 <?php echo $args['li']['classes'] ?>">
        <a href="<?php echo get_category_link( get_the_category()[0] ) ?>" class="<?php echo $args['a']['classes'] ?>">
            <?php echo get_the_category()[0]->cat_name ?>
        </a>
    </li>
</ul>