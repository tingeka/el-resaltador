<?php
/**
 * Generates a string of HTML attributes from an associative array.
 *
 * This function takes an associative array of key-value pairs and generates a
 * string of HTML attributes. The keys are the attribute names and the values
 * are the attribute values. The function ensures that the last attribute does
 * not have a trailing space.
 *
 * @package El_Resaltador
 * @param array $attr   Associative array of attributes.
 * @return string       String of HTML attributes.
 */

if ( ! function_exists( 'cmlt_er_generate_attr_string' ) ) :
	function cmlt_er_generate_attr_string( $attr ) { // phpcs:ignore Squiz.Commenting.FunctionComment.Missing
		$attr_string = '';
		if ( ! empty( $attr ) ) {
				/**
				 * If we have attributes, loop through the key/value pairs passed in
				 * and return result HTML as a string.
				 */
			foreach ( $attr as $key => $value ) {

				$key = esc_attr( $key ); // Escape the attribute key.

				switch ( $key ) {
					case 'href':
						$value = esc_url( $value ); // Escape the attribute value.
						break;
					case 'src':
						$value = esc_url( $value ); // Escape the attribute value.
						break;
					default:
						$value = esc_attr( $value ); // Escape the attribute value.
						break;
				}

				$attr_string .= $key . '="' . $value . '" ';

			}

				$attr_string = rtrim( $attr_string ); // Remove the trailing space.

		}

		return $attr_string;
	}
endif;
