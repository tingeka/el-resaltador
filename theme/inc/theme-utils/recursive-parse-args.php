<?php
/**
 * Recursively merges user-defined arguments into the defaults array.
 *
 * This function takes two arrays, $args and $defaults, and recursively merges the
 * elements from $args into $defaults. The purpose is to allow for a limited set
 * of keys to be set in $args, while leaving the rest of the values in $defaults.
 *
 * @param array $args       Array of arguments to be merged.
 * @param array $defaults   Array of default values.
 * @return array            Merged array.
 */
if ( ! function_exists( 'cmlt_er_recursive_parse_args' ) ) {
	function cmlt_er_recursive_parse_args( $args, $defaults ) {
		$new_args = (array) $defaults;

		foreach ( $args as $key => $value ) {
			if ( is_array( $value ) && isset( $new_args[ $key ] ) ) {
				$new_args[ $key ] = cmlt_er_recursive_parse_args( $value, $new_args[ $key ] );
			}
			else {
				$new_args[ $key ] = $value;
			}
		}

		return $new_args;
	}
}