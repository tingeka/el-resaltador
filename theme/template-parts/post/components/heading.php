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

// echo '<pre>'; print_r($args); echo '</pre>';

$args = wp_parse_args(
    $args,
    [
        'content' => '',
        'tag'     => 'h1',
        'link'    => '',
        'classes' => '',
    ]
);
// echo '<pre>'; print_r($args); echo '</pre>';

?>
<?php if ( $args['link'] ): ?>
    <a href="<?php echo $args['link'] ?>">
        <<?php echo $args['tag']?> class="<?php echo $args['classes']?>">
            <?php echo $args['content'] ?>
        </<?php echo $args['tag'] ?>>
    </a>
<?php else: ?>
    <<?php echo $args['tag']?> class="<?php echo $args['classes']?>">
        <?php echo $args['content'] ?>
    </<?php echo $args['tag'] ?>>
<?php endif; ?>