<?php

function cmlt_er_load_blocks_extensions() {
    
    // var_dump(get_template_directory());

	$index_entry = get_template_directory() . '/gutenberg/build/block-extensions/index.js';
	$index_assets = get_template_directory() . '/gutenberg/build/block-extensions/index.asset.php';

	if ( 
        file_exists( $index_entry )
        && file_exists( $index_assets )
        ) {
            
        $index_uri = get_template_directory_uri() . '/gutenberg/build/block-extensions/index.js';

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
add_action( 'enqueue_block_editor_assets', 'cmlt_er_load_blocks_extensions' );