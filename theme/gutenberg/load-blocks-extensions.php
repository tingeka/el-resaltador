<?php
/**
 * Block Extensions Loader
 *
 * This file is responsible for loading and enqueuing the block extensions
 * for the Gutenberg editor in the El Resaltador theme.
 *
 * It checks for the existence of the block extensions' index.js and index.asset.php files,
 * and if found, enqueues the script with the appropriate dependencies and version.
 *
 * @package El_Resaltador
 * @subpackage Gutenberg
 * @since 1.0.0
 */

/**
 * Enqueue the Gutenberg block extensions JavaScript file.
 *
 * This function checks if the block extensions JavaScript file and its asset file exist, and if so, enqueues the JavaScript file.
 *
 * @return void
 */
function cmlt_er_load_blocks_extensions() {

	$index_entry  = get_template_directory() . '/gutenberg/block-extensions/index.js';
	$index_assets = get_template_directory() . '/gutenberg/block-extensions/index.asset.php';

	if ( file_exists( $index_entry )
		&& file_exists( $index_assets )
		) {

		$index_uri = get_template_directory_uri() . '/gutenberg/block-extensions/index.js';

		$assets = require_once $index_assets;

		wp_enqueue_script(
			'camalote-blocks-extensions',
			$index_uri,
			$assets['dependencies'],
			$assets['version'],
			true
		);
	}
}





















/**
	* Enqueue the Gutenberg block extensions JavaScript file.
	*
	* This function checks if the block extensions JavaScript file and its asset file exist, and if so, enqueues the JavaScript file.
	*
	* @return void
	*/add_action( 'enqueue_block_editor_assets', 'cmlt_er_load_blocks_extensions' );
