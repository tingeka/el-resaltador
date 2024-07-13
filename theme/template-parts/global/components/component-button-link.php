<?php
/**
 * Template part for button, link variant.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$args = cmlt_er_recursive_parse_args(
    $args,
    [
        'type' => '',
        'link' => [
            'url'       => '',
            'title'     => '',
            'target'    => '',
            'classes'   => '',
        ],
        'icon' => [
            'display'   => false,
            'type'      => '',
            'name'      => '',
            'id'        => '',
            'size'      => '',
            'classes'   => '',
        ],
        'text' => [
            'display'   => false,
            'content'   => '',
            'classes'   => '',
        ],
    ]
);

$link_url = $args['link']['url'];
$link_title = $args['link']['title'];
$link_target = $args['link']['target'];
$link_classes = $args['link']['classes'];

$icon_display = $args['icon']['display'];

$icon_type = $args['icon']['type'];
$icon_name = $args['icon']['name'];
$icon_id = $args['icon']['id'];
$icon_size = $args['icon']['size'];
$icon_classes = $args['icon']['classes'];

$text_display = $args['text']['display'];

$text_content = $args['text']['content'];
$text_classes = $args['text']['classes'];

// Icon buffer
$icon_html = '';
if ( $icon_display && !empty( $icon_name ) ):
    ob_start();
    get_template_part( 
        'template-parts/global/components/component-icon',
        '',
        [
            'type'  => $icon_type,
            'name' => $icon_name,
            'id' => $icon_id,
            'size' => $icon_size,
            'classes' => $icon_classes
        ]
    );
    $icon_html = ob_get_clean();
endif;

$link_type = $args['type'];
switch ( $link_type ):
    case 'primary':
        $link_classes = implode( ' ', [ 'btn btn-primary flex gap-2 items-center' . $link_classes ] );
        break;
    case 'neutral':
        $link_classes = implode( ' ', [ 'btn btn-neutral flex gap-2 items-center' . $link_classes ] );
        break;
    case 'icon':
        $link_classes = implode( ' ', [ 'flex' . $link_classes ] );
        break;
    default:
        $link_classes = implode( ' ', [ 'flex gap-2 items-center', $link_classes ] );
        break;
endswitch;

// Start button markup with <a> tag
$text_html = $text_display && !empty( $text_content ) ? cmlt_er_content_tag( 'span', $text_content, [ 'class' => $text_classes ] ) : '';
$content = $icon_html . $text_html;
$link_html = cmlt_er_content_tag( 'a', $content, [ 'href' => $link_url, 'title' => $link_title, 'target' => $link_target, 'class' => $link_classes ] );

echo $link_html;