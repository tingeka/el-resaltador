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
	function cmlt_er_recursive_parse_args( $args = [], $defaults = [] ) {
		
		// Check if $args and $defaults are arrays, issue a warning and log an error if not
		if ( !is_array( $args ) ) {
			$message = 'cmlt_er_recursive_parse_args: Argument $args should be an array.';
			trigger_error( $message, E_USER_WARNING );
			error_log( $message );
			return $defaults; // Or return an empty array [] if preferred
		}
		
		if ( !is_array( $defaults )) {
			$message = 'cmlt_er_recursive_parse_args: Argument $defaults should be an array.';
			trigger_error( $message, E_USER_WARNING );
			error_log( $message );
			return []; // Or return $args if you want to preserve the input
		}

		$new_args = $defaults;

		foreach ( $args as $key => $value ) {
			if ( is_array( $value ) && isset( $new_args[ $key ] ) ) {
				$new_args[ $key ] = cmlt_er_recursive_parse_args( $value, $new_args[ $key ] );
			}
			elseif ( !empty( $value ) || ( isset( $new_args[ $key ] ) && is_null( $value ) ) ) {
				$new_args[ $key ] = $value;
			}
		}

		return $new_args;
	}
}