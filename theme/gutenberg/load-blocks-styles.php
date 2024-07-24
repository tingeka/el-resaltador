<?php
/**
 * Block Styles Loader
 *
 * This file is responsible for loading and enqueuing the block styles
 * for the Gutenberg editor in the El Resaltador theme.
 *
 * It checks for the existence of the block styles' index.js and index.asset.php files,
 * and if found, enqueues the script with the appropriate dependencies and version.
 *
 * @package El_Resaltador
 * @subpackage Gutenberg
 * @since 1.0.0
 */

/**
 * Enqueues the block styles script for the Gutenberg editor in the El Resaltador theme.
 *
 * This function checks for the existence of the block styles' index.js and index.asset.php files,
 * and if found, enqueues the script with the appropriate dependencies and version.
 *
 * @return void
 */
function cmlt_er_load_blocks_styles() {

	$index_entry  = get_template_directory() . '/gutenberg/block-styles/index.js';
	$index_assets = get_template_directory() . '/gutenberg/block-styles/index.asset.php';

	if ( file_exists( $index_entry )
		&& file_exists( $index_assets )
		) {

		$index_uri = get_template_directory_uri() . '/gutenberg/block-styles/index.js';

		$assets = require_once $index_assets;

		wp_enqueue_script(
			'camalote-blocks-styles',
			$index_uri,
			$assets['dependencies'],
			$assets['version'],
			true
		);
	}
}
add_action( 'enqueue_block_editor_assets', 'cmlt_er_load_blocks_styles' );
