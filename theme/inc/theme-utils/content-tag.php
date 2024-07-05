<?php
/**
 * Generates an HTML tag with content and optional attributes.
 *
 * This function takes an HTML tag name, content, and an optional associative
 * array of attributes, and generates the full HTML tag with the specified
 * content and attributes.
 *
 * @param string $tag      HTML tag name.
 * @param string $content  Content to be placed inside the tag.
 * @param array  $attr     (optional) Associative array of attributes.
 * @return string          Full HTML tag with content and attributes.
 */
if ( ! function_exists( 'cmlt_er_content_tag' ) ) {
    function cmlt_er_content_tag( $tag, $content, $attr = [] ) {
        return cmlt_er_open_tag($tag, $attr) . $content . cmlt_er_close_tag($tag);
      }
}