<?php
/**
 * Recursively merges user-defined arguments into the defaults array.
 *
 * This function takes two arrays, $args and $defaults, and recursively merges the
 * elements from $args into $defaults. The purpose is to allow for a limited set
 * of keys to be set in $args, while leaving the rest of the values in $defaults.
 *
 * @package El_Resaltador
 * @param array $args       Array of arguments to be merged.
 * @param array $defaults   Array of default values.
 * @return array            Merged array.
 */

if ( ! function_exists( 'cmlt_er_recursive_parse_args' ) ) {
	function cmlt_er_recursive_parse_args( $args = array(), $defaults = array() ) {//phpcs:ignore Squiz.Commenting.FunctionComment.Missing

		// Check if $args and $defaults are arrays.
		if ( ! is_array( $args ) ) {
			return $defaults; // Return defaults if $args is not an array.
		}

		if ( ! is_array( $defaults ) ) {
			return $args; // Return $args if $defaults is not an array.
		}

		// Merge $args with $defaults, preserving existing values in $args.
		foreach ( $defaults as $key => $default_value ) {
			// Check if $key exists in $args and $args[$key] is not null, empty string, or empty array.
			if ( ! isset( $args[ $key ] ) || cmlt_er_is_empty_value( $args[ $key ] ) ) {
				$args[ $key ] = $default_value;
			} elseif ( is_array( $args[ $key ] ) && is_array( $default_value ) ) {
				// If both $args[$key] and $default_value are arrays, recursively merge.
				$args[ $key ] = cmlt_er_recursive_parse_args( $args[ $key ], $default_value );
			}
		}

		return $args;
	}

}
