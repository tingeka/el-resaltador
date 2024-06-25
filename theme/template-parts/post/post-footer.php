<?php
/**
 * Template part for post footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

 ?>

<div class="<?php echo $args['wrapper']['classes'] ?>">
    <?php
    get_template_part( 'template-parts/post/post-footer', 'author', [
        'author' => [
            'id' => $args['author']['id'],
            'name' => get_the_author_meta( 'display_name', $args['author']['id'] ),
            'link' => get_the_author_meta( 'user_url', $args['author']['id'] ),
            'classes' => $args['author']['classes'],
        ],
    ] );
    get_template_part( 'template-parts/post/post-footer', 'date', [
        'date' => [
            'classes' => $args['date']['classes'],
        ],
    ] );
    ?>
</div>