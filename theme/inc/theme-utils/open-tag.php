<?php
/**
 * Generates an opening HTML tag with optional attributes.
 *
 * This function takes an HTML tag name and an optional associative array of
 * attributes, and generates the opening tag with the specified attributes.
 *
 * @package El_Resaltador
 * @param string $tag   HTML tag name.
 * @param array  $attr  (optional) Associative array of attributes.
 * @return string       Opening HTML tag with attributes.
 */

if ( ! function_exists( 'cmlt_er_open_tag' ) ) {
	function cmlt_er_open_tag( $tag, $attr = array() ) {//phpcs:ignore Squiz.Commenting.FunctionComment.Missing
		$attr_string = cmlt_er_generate_attr_string( $attr );
		return '<' . $tag . ' ' . $attr_string . '>';
	}
}
