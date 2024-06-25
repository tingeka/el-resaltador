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
$title_content = $args['title']['content'] ?? '';
$title_tag = $args['title']['tag'] ?? 'h1';
$title_classes = $args['title']['classes'] ?? '';
$title_link = $args['title']['link'] ?? '';
?>
<a href="<?php echo $title_link ?>">
    <<?php echo $title_tag ?> 
        class="m-0 <?php echo $title_classes ?>"
        >
        <?php echo $title_content ?>
    </<?php echo $title_tag ?>>
</a>