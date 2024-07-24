<?php
/**
 * Retrieves a nested menu array from a WordPress menu location.
 *
 * @package El_Resaltador
 * @param string $menu_name The name of the menu location to retrieve.
 * @return array An array representing the nested menu structure.
 */

if ( ! function_exists( 'cmlt_er_get_menu_array' ) ) :
	function cmlt_er_get_menu_array( $menu_location ) {// phpcs:ignore Squiz.Commenting.FunctionComment.Missing

		// Get the menu locations.
		$locations = get_nav_menu_locations();
		// Check if the specified menu location exists.
		if ( ! isset( $locations[ $menu_location ] ) ) {
			return array();
		}

		// Get the menu object.
		$menu_object = wp_get_nav_menu_object( $locations[ $menu_location ] );
		// Check for WP_Error.
		if ( is_wp_error( $menu_object ) ) {
			return array();
		}

		// Get the menu items.
		$cmlt_er_menu_items = wp_get_nav_menu_items( $menu_object->term_id );
		// Check for WP_Error.
		if ( is_wp_error( $cmlt_er_menu_items ) ) {
			return array();
		}

		// Check if menu items are empty.
		if ( empty( $cmlt_er_menu_items ) ) {
			return array();
		}

		// Create an empty array to hold the nested menu.
		$menu_array = array();
		$menu_dict  = array();

		// First, organize all items into a dictionary indexed by the item ID.
		foreach ( $cmlt_er_menu_items as $menu_item ) {
			$menu_dict[ $menu_item->ID ] = array(
				'ID'       => $menu_item->ID,
				'title'    => $menu_item->title,
				'url'      => $menu_item->url,
				'parent'   => $menu_item->menu_item_parent,
				'children' => array(),
			);
		}

		// Next, build the nested structure.
		foreach ( $menu_dict as $id => &$menu_item ) {
			if ( $menu_item['parent'] ) {
				$menu_dict[ $menu_item['parent'] ]['children'][] = &$menu_item;
			} else {
				$menu_array[] = &$menu_item;
			}
		}

		return $menu_array;
	}
endif;
