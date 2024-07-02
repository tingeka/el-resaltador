<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<?php
	switch ( get_post_type() ):
		case 'post':
			get_template_part('template-parts/post/content/content', 'post');
			break;
		default:
			get_template_part('template-parts/post/content/content');
	endswitch;
	
?>