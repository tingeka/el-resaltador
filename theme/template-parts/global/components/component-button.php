<?php
/**
 * Template part for button.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$args = cmlt_er_recursive_parse_args(
    $args,
    [
        'type' => '',
        'classes' => '',
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
        'attr' => []
    ]
);

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

$button_type = $args['type'];
$button_classes = $args['classes'];
switch ( $button_type ):
    case 'primary':
        $button_classes = rtrim( 'btn btn-primary flex gap-2 items-center ' . $button_classes );
        break;
    case 'neutral':
        $button_classes = rtrim( 'btn btn-neutral flex gap-2 items-center ' . $button_classes );
        break;
    case 'icon':
        $button_classes = rtrim( 'flex ' . $button_classes );
        break;
    default:
        $button_classes = rtrim( 'flex gap-2 items-center ' . $button_classes );
        break;
endswitch;

$attrs = $args['attr'];
$attrs = array_merge( $attrs, [ 'class' => $button_classes ] );

// Start button markup with <a> tag
$text_html = $text_display && !empty( $text_content ) ? cmlt_er_content_tag( 'span', $text_content, [ 'class' => $text_classes ] ) : '';
$content = $icon_html . $text_html;
$button_html = cmlt_er_content_tag( 
    'button', 
    $content, 
    $attrs
);

echo $button_html;