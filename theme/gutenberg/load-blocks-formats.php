<?php

function cmlt_er_load_blocks_formats() {
    
    // var_dump(get_template_directory());

	$index_entry = get_template_directory() . '/gutenberg/block-formats/index.js';
	$index_assets = get_template_directory() . '/gutenberg/block-formats/index.asset.php';

	if ( 
        file_exists( $index_entry )
        && file_exists( $index_assets )
        ) {
            
        $index_uri = get_template_directory_uri() . '/gutenberg/block-formats/index.js';

        $assets = require_once $index_assets;
        
        wp_enqueue_script(
            'camalote-blocks-formats',
            $index_uri,
            $assets['dependencies'],
            $assets['version'],
            true
        );
	}
}
add_action( 'enqueue_block_editor_assets', 'cmlt_er_load_blocks_formats' );