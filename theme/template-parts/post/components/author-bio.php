<?php
/**
 * Template part for post footer author bio
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
        'classes' => '',
    ]
);
?>

<p 
    class="<?php echo $args['classes'] ?>"
>
    <?php 
        echo $args['content']
    ?>
</p>