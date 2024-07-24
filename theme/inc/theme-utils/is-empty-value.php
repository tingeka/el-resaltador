<?php
/**
 *
 * Checks if a given value is considered "empty".
 *
 * @package El_Resaltador
 * @param mixed $value The value to check.
 * @return bool True if the value is considered empty, false otherwise.
 */

if ( ! function_exists( 'cmlt_er_is_empty_value' ) ) :
	function cmlt_er_is_empty_value( $value ) {// phpcs:ignore Squiz.Commenting.FunctionComment.Missing
		return null === $value || '' === $value || ( is_array( $value ) && empty( $value ) );
	}
endif;
