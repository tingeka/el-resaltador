<?php
/**
 * Template part for displaying post header
 * 
 * Renders the post header content, optionally wrapped in a link.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 *
 * @param array $args {
 *     Optional. Arguments to customize the post header output.
 *
 *     @type string $content The post header content.
 *     @type string $tag     The HTML tag to use for the post header.
 *     @type string $link    The URL to link the post header to.
 *     @type string $classes Additional CSS classes to apply to the post header.
 * }
 * 
 */

$args = cmlt_er_recursive_parse_args(
    $args,
    [
        'content' => get_the_title(),
        'tag'     => 'h1',
        'link'    => '',
        'classes' => 'entry-title m-0',
    ]
);

$content = esc_html( $args['content'] );
$tag     = $args['tag'];
$link    = $args['link'];
$classes = $args['classes'];

$title_html = cmlt_er_content_tag(
    $tag,
    $content,
    [
        'class' => $classes,
    ]
);

$link_html = cmlt_er_content_tag(
    'a',
    $title_html,
    [
        'href' => $link,
    ]
);

$output = $args['link'] ? $link_html : $title_html;

echo $output;

?>