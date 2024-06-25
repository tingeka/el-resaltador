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

$author_id = $args['author']['id'] ?? '';
$author_name = $args['author']['name'] ?? '';
$author_link = $args['author']['link'] ?? '';
$classes = $args['author']['classes'] ?? '';

?>

<a 
    href="<?php echo $author_link ?>" 
    class="<?php echo $classes ?>"
>
    <?php 
        echo $author_name
    ?>
</a>