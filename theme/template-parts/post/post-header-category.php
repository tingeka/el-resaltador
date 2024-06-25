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

$ul_classes = $args['ul']['classes'] ?? '';
$li_classes = $args['li']['classes'] ?? '';
$a_classes = $args['a']['classes'] ?? '';

?>

<ul class="m-0 p-0 list-none font-mono <?php echo $ul_classes ?>">
    <li class="p-0 <?php echo $li_classes ?>">
        <a href="<?php echo get_category_link( get_the_category()[0] ) ?>" class="<?php echo $a_classes ?>">
            <?php echo get_the_category()[0]->cat_name ?>
        </a>
    </li>
</ul>