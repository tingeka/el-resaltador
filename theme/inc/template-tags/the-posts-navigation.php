<?php
/**
 * Wraps `the_posts_pagination` for use throughout the theme.
 *
 * This function provides a consistent way to display pagination for post listings
 * across the theme. It adds screen reader-only text to the previous and next
 * links to improve accessibility.
 *
 * @package El_Resaltador
 * @return void
 */

if ( ! function_exists( 'cmlt_er_the_posts_navigation' ) ) :
	/**
	 * Wraps `the_posts_pagination` for use throughout the theme.
	 */
	function cmlt_er_the_posts_navigation() {

		$prev_text_sr = cmlt_er_content_tag(
			'span',
			esc_html__( 'Anterior', 'el-resaltador' ),
			array(
				'class' => 'sr-only',
			)
		);
		$prev_text    = $prev_text_sr . esc_html__( '<', 'el-resaltador' );

		$next_text_sr = cmlt_er_content_tag(
			'span',
			esc_html__( 'Siguiente', 'el-resaltador' ),
			array(
				'class' => 'sr-only',
			)
		);
		$next_text    = $next_text_sr . esc_html__( '>', 'el-resaltador' );

		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => $prev_text,
				'next_text' => $next_text,
			)
		);
	}
endif;
