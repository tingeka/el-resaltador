<?php
/**
 * Prints HTML with meta information for the current post-date/time.
 *
 * @package El_Resaltador
 * @param string $classes A string of CSS classes to apply to the time element.
 * @return string The HTML string with the post date/time information.
 */

if ( ! function_exists( 'cmlt_er_posted_on' ) ) :

	function cmlt_er_posted_on( $classes = '' ) {//phpcs:ignore Squiz.Commenting.FunctionComment.Missing

		$time_string = cmlt_er_content_tag(
			'time',
			esc_html( get_the_date() ),
			array(
				'datetime' => esc_attr( get_the_date( DATE_W3C ) ),
			)
		);

		$cmlt_er_output = cmlt_er_content_tag(
			'span',
			$time_string,
			array(
				'class' => $classes,
			)
		);

		return $cmlt_er_output;
	}
endif;
