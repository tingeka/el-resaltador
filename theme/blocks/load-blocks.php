<?php

// add_action( 'carbon_fields_register_fields', 'cmlt_er_load_blocks' );
// function cmlt_er_load_blocks() {
//     require_once 'nota-de-tapa/block-nota-tapa.php';
// }

// function minimal_block_ca6eda___register_block() {
//     var_dump( __DIR__ . '/nota-de-tapa/build' );
//     register_block_type( __DIR__ . '/build/block.json' );
// }
// add_action( 'init', 'minimal_block_ca6eda___register_block' );

function cmlt_er_load_blocks() {
    // Get an array of all block.json files in the directory
    $block_json_files = glob( __DIR__ . '/build/*/block.json' );

    // Check if any block.json files were found
    if ( $block_json_files ) {
        foreach ( $block_json_files as $block_json_file ) {
            // Register block type using the path to block.json
            register_block_type( $block_json_file );
        }
    }
}
add_action( 'init', 'cmlt_er_load_blocks' );
