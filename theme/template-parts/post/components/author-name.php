<?php
/**
 * Template part for post footer author
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
        'display' => null,
        'content' => '',
        'link'    => '',
        'classes' => '',
    ]
);
?>

<a 
    href="<?php echo $args['link'] ?>" 
    class="<?php echo $args['classes'] ?>"
>
    <?php 
        echo $args['content']
    ?>
</a>