<?php
/**
 * Retrieves a nested menu array from a WordPress menu location.
 *
 * @param string $menu_name The name of the menu location to retrieve.
 * @return array An array representing the nested menu structure.
 */
if ( !function_exists( 'cmlt_er_get_menu_array' ) ):
    function cmlt_er_get_menu_array( $menu_location ) {
        
        // Get the menu locations.
        $locations = get_nav_menu_locations();
        // Check if the specified menu location exists.
        if ( ! isset( $locations[ $menu_location ] ) ) {
            error_log( "Menu location '{ $menu_location }' is not registered." );
            return [];
        }
        
        // Get the menu object.
        $menu_object = wp_get_nav_menu_object( $locations[ $menu_location ] );
        // Check for WP_Error.
        if ( is_wp_error( $menu_object ) ) {
            error_log( "Failed to get menu object for location '{ $menu_location }': " . $menu_object->get_error_message() );
            return [];
        }

        // Get the menu items.
        $menu_items = wp_get_nav_menu_items( $menu_object->term_id );
        // Check for WP_Error.
        if ( is_wp_error( $menu_items ) ) {
            error_log( "Failed to get menu items for menu ID { $menu_object->term_id }: " . $menu_items->get_error_message() );
            return [];
        }

        // Check if menu items are empty.
        if ( empty( $menu_items ) ) {
            error_log( "No menu items found for menu ID { $menu_object->term_id }." );
            return [];
        }


        // Create an empty array to hold the nested menu.
        $menu_array = [];
        $menu_dict = [];

        // First, organize all items into a dictionary indexed by the item ID.
        foreach ( $menu_items as $menu_item ) {
            $menu_dict[ $menu_item->ID ] = [
                'ID' => $menu_item->ID,
                'title' => $menu_item->title,
                'url' => $menu_item->url,
                'parent' => $menu_item->menu_item_parent,
                'children' => []
            ];
        }

        // Next, build the nested structure.
        foreach ( $menu_dict as $id => &$menu_item ) {
            if ( $menu_item['parent'] ) {
                $menu_dict[ $menu_item[ 'parent' ]][ 'children' ][] = &$menu_item;
            } else {
                $menu_array[] = &$menu_item;
            }
        }

        return $menu_array;
    }
endif;