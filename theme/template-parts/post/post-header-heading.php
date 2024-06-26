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
$args = wp_parse_args(
    $args,
    [
        'content' => '',
        'tag'     => 'h1',
        'link'    => '',
        'classes' => '',
    ]
);

?>
<a href="<?php echo $args['link'] ?>">
    <<?php echo $args['tag']?> class="m-0 <?php echo $args['classes']?>">
        <?php echo $args['content'] ?>
    </<?php echo $args['tag'] ?>>
</a>