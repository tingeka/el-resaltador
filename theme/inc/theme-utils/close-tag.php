<?php
/**
 * Generates a closing HTML tag.
 *
 * This function takes an HTML tag name and generates the corresponding closing
 * tag.
 *
 * @package El_Resaltador
 * @param string $tag   HTML tag name.
 * @return string       Closing HTML tag.
 */

if ( ! function_exists( 'cmlt_er_close_tag' ) ) {

	function cmlt_er_close_tag( $tag ) {// phpcs:ignore Squiz.Commenting.FunctionComment.Missing
		return '</' . $tag . '>';
	}
}
