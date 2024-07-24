<?php
/**
 * Blocks Loader
 *
 * This file is responsible for loading and enqueuing the custom blocks
 * for the Gutenberg editor in the El Resaltador theme.
 *
 * This function scans the `blocks` directory for any `block.json` files, and
 * registers the corresponding block types using the `register_block_type()`
 * function.
 *
 * @package El_Resaltador
 * @subpackage Gutenberg
 * @since 1.0.0
 */

/**
 * Loads and registers all custom Gutenberg blocks for the El Resaltador theme.
 *
 * This function scans the `blocks` directory for any `block.json` files, and
 * registers the corresponding block types using the `register_block_type()`
 * function.
 *
 * @return void
 */
function cmlt_er_load_blocks() {
	// Get an array of all block.json files in the directory.
	$block_json_files = glob( __DIR__ . '/blocks/*/block.json' );

	// Check if any block.json files were found.
	if ( $block_json_files ) {
		foreach ( $block_json_files as $block_json_file ) {
			// Register block type using the path to block.json.
			register_block_type( $block_json_file );
		}
	}
}
add_action( 'init', 'cmlt_er_load_blocks' );
