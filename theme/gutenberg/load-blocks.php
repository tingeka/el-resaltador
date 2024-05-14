<?php

function cmlt_er_load_blocks() {
    // Get an array of all block.json files in the directory
    $block_json_files = glob( __DIR__ . '/build/blocks/*/block.json' );

    // Check if any block.json files were found
    if ( $block_json_files ) {
        foreach ( $block_json_files as $block_json_file ) {
            // Register block type using the path to block.json
            register_block_type( $block_json_file );
        }
    }
}
add_action( 'init', 'cmlt_er_load_blocks' );
