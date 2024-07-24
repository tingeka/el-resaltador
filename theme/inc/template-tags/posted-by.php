<?php
/**
 * Prints HTML with meta information about the post author.
 *
 * @package El_Resaltador
 * @param string $classes Optional. CSS classes to apply to the author span.
 * @return string HTML output containing the author information.
 */

if ( ! function_exists( 'cmlt_er_posted_by' ) ) :

	function cmlt_er_posted_by( $classes = '' ) {//phpcs:ignore Squiz.Commenting.FunctionComment.Missing

		$screen_reader_text = cmlt_er_content_tag(
			'span',
			esc_html__( 'Publicado por:', 'el-resaltador' ),
			array( 'class' => 'sr-only' )
		);

		$author_link = cmlt_er_content_tag(
			'a',
			esc_html( get_the_author() ),
			array(
				'class' => 'url fn n',
				'href'  => get_author_posts_url( get_the_author_meta( 'ID' ) ),
			)
		);

		$author_span = cmlt_er_content_tag(
			'span',
			$author_link,
			array(
				'class' => rtrim( 'author vcard ' . $classes ),
			)
		);

		return $screen_reader_text . $author_span;
	}
endif;
