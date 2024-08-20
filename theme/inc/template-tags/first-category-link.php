<?php
/**
 * Retrieves the first category link for the current post.
 *
 * @package El_Resaltador
 * @param string $classes Optional. CSS classes to apply to the category link.
 * @return string The HTML for the first category link, or an empty string if no categories are found.
 */

if ( ! function_exists( 'cmlt_er_first_category_link' ) ) :
	/**
	 * Retrieves the first category link for the current post.
	 *
	 * @param string $classes Optional. CSS classes to apply to the category link.
	 * @return string The HTML for the first category link, or an empty string if no categories are found.
	 */
	function cmlt_er_first_category_link( $classes = '' ) {
		// Get the first category of the post.
		$category = get_the_category();
		if ( ! empty( $category ) ) {
			// Extract the first category.
			$category      = $category[0];
			$category_link = get_category_link( $category );
			$category_name = $category->name;

			// Output the HTML with localized and escaped category name.
			$first_category_html = cmlt_er_content_tag(
				'a',
				esc_html( $category_name ),
				array(
					'href'  => $category_link,
					'class' => $classes,
				)
			);

			return $first_category_html;
		}
		return '';
	}
endif;
