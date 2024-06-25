<?php
/**
 * Template part for post footer date
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

 ?>

<?php
    $classes = $args['date']['classes'] ?? '';
    cmlt_er_posted_on( $classes );
?>