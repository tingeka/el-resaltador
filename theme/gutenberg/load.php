<?php
/**
 * Custom Blocks Loader
 *
 * Loads various components related to Gutenberg blocks for the El Resaltador theme.
 *
 * This code is responsible for loading and enqueuing the custom blocks, block extensions,
 * block formats, and block styles for the Gutenberg editor in the El Resaltador theme.
 *
 * The `load-blocks.php` file is responsible for registering the custom block types using
 * the `register_block_type()` function.
 *
 * The `load-blocks-extensions.php` file is responsible for loading any custom block
 * extensions, such as custom block attributes or block-level filters.
 *
 * The `load-blocks-formats.php` file is responsible for registering any custom block
 * formats, which can be used to apply specific formatting to content within a block.
 *
 * The `load-blocks-styles.php` file is responsible for enqueuing any custom CSS styles
 * that are required for the Gutenberg blocks used in the El Resaltador theme.
 *
 * @package El_Resaltador
 * @subpackage Gutenberg
 * @since 1.0.0
 */

/* LOAD BLOCKS */
require __DIR__ . '/load-blocks.php';

/* LOAD BLOCKS EXTENSIONS */
require __DIR__ . '/load-blocks-extensions.php';

/* LOAD BLOCKS FORMATS */
require __DIR__ . '/load-blocks-formats.php';

/* LOAD BLOCKS STYLES */
require __DIR__ . '/load-blocks-styles.php';
