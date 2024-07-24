<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
	if ( ! is_front_page() ) :
		get_template_part(
			'template-parts/global/sections/section',
			'page-header',
			array(
				'title'       => array(
					'content' => get_the_title(),
				),
				'breadcrumbs' => array(
					'display' => true,
				),
				'excerpt'     => array(
					'display' => true,
					'content' => get_the_excerpt(),
					'classes' => 'max-w-[40rem] my-0 text-lg',
				),
			)
		);
	endif;
	?>

	<?php cmlt_er_post_thumbnail(); ?>

	<div <?php cmlt_er_content_class( 'entry-content' ); ?>>
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>' . __( 'Pages:', 'el-resaltador' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
