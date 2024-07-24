<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>
<?php do_action( 'cmlt_er_action_post_before_content' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'px-4' ); ?>>
	<!-- Post Header -->
	<?php
		get_template_part(
			'template-parts/post/sections/section',
			'header-single',
			array(
				'container'   => array(
					'classes' => '',
				),
				'wrapper'     => array(
					'classes' => '',
				),
				'breadcrumbs' => array(
					'display' => true,
					'classes' => '',
				),
				'category'    => array(
					'display' => true,
					'ul'      => array(
						'classes' => '',
					),
					'li'      => array(
						'classes' => '',
					),
					'a'       => array(
						'classes' => '',
					),
				),
				'title'       => array(
					'content' => '',
					'tag'     => '',
					'link'    => '',
					'classes' => '',
				),
				'excerpt'     => array(
					'display' => false,
					'content' => '',
					'classes' => '',
				),
				'footer'      => array(
					'container' => array(
						'classes' => '',
					),
					'author'    => array(
						'classes' => '',
					),
					'date'      => array(
						'classes' => '',
					),
				),
			)
		);
		?>
	<!-- Post Content -->
	<?php
		get_template_part(
			'template-parts/post/sections/section',
			'content-single',
			array()
		)
		?>
	<!-- Post Footer -->
	<?php
		get_template_part(
			'template-parts/post/sections/section',
			'footer-single',
			array(
				'container'  => array(
					'classes' => '',
				),
				'tags'       => array(
					'container' => array(
						'classes' => '',
					),
					'wrapper'   => array(
						'classes' => '',
					),
					'list'      => array(
						'classes' => '',
					),
					'item'      => array(
						'classes' => '',
					),
				),
				'author-box' => array(
					'container' => array(
						'classes' => '',
					),
					'wrapper'   => array(
						'classes' => '',
					),
					'image'     => array(
						'content' => '',
						'classes' => '',
					),
					'name'      => array(
						'classes' => '',
					),
					'bio'       => array(
						'content' => '',
						'classes' => '',
					),
				),
			)
		)
		?>
</article><!-- #post-${ID} -->
<?php do_action( 'cmlt_er_action_post_after_content' ); ?>
