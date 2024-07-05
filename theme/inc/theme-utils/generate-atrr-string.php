<?php
/**
 * Generates a string of HTML attributes from an associative array.
 *
 * This function takes an associative array of key-value pairs and generates a
 * string of HTML attributes. The keys are the attribute names and the values
 * are the attribute values. The function ensures that the last attribute does
 * not have a trailing space.
 *
 * @param array $attr   Associative array of attributes.
 * @return string       String of HTML attributes.
 */
if ( ! function_exists( 'cmlt_er_generate_attr_string' ) ) {
    function cmlt_er_generate_attr_string( $attr ) {
        $attr_string = null;
        if (!empty($attr)) {
        foreach ($attr as $key => $value) {
            // If we have attributes, loop through the key/value pairs passed in
            //and return result HTML as a string
            
            // Don't put a space after the last value
            if ($value == end($attr)) {
            $attr_string .= $key . "=" . '"' . $value . '"';
            } else {
            $attr_string .= $key . "=" . '"' . $value . '" ';
            }
        }
        }		
    return $attr_string;
    }
}