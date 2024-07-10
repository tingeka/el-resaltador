<?php
/**
 * 
 * Checks if a given value is considered "empty".
 *
 * @param mixed $value The value to check.
 * @return bool True if the value is considered empty, false otherwise.
 * 
 */
if ( ! function_exists( 'cmlt_er_is_empty_value' ) ):
    function cmlt_er_is_empty_value( $value ) {
        return $value === null || $value === '' || ( is_array( $value ) && empty( $value ) );
    }
endif;