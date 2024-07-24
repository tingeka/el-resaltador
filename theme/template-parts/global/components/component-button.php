<?php
/**
 * Template part for button.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args,
	array(
		'type'    => '',
		'classes' => '',
		'icon'    => array(
			'display' => false,
			'type'    => '',
			'name'    => '',
			'id'      => '',
			'size'    => '',
			'classes' => '',
		),
		'text'    => array(
			'display' => false,
			'content' => '',
			'classes' => '',
		),
		'attr'    => array(),
	)
);

$cmlt_er_icon_display = $cmlt_er_template_part_args['icon']['display'];

$cmlt_er_icon_type    = $cmlt_er_template_part_args['icon']['type'];
$cmlt_er_icon_name    = $cmlt_er_template_part_args['icon']['name'];
$cmlt_er_icon_id      = $cmlt_er_template_part_args['icon']['id'];
$cmlt_er_icon_size    = $cmlt_er_template_part_args['icon']['size'];
$cmlt_er_icon_classes = $cmlt_er_template_part_args['icon']['classes'];

$cmlt_er_text_display = $cmlt_er_template_part_args['text']['display'];

$cmlt_er_text_content = $cmlt_er_template_part_args['text']['content'];
$cmlt_er_text_classes = $cmlt_er_template_part_args['text']['classes'];

// Icon buffer.
$cmlt_er_icon_html = '';
if ( $cmlt_er_icon_display && ! empty( $cmlt_er_icon_name ) ) :
	ob_start();
	get_template_part(
		'template-parts/global/components/component-icon',
		'',
		array(
			'type'    => $cmlt_er_icon_type,
			'name'    => $cmlt_er_icon_name,
			'id'      => $cmlt_er_icon_id,
			'size'    => $cmlt_er_icon_size,
			'classes' => $cmlt_er_icon_classes,
		)
	);
	$cmlt_er_icon_html = ob_get_clean();
endif;

$cmlt_er_button_type    = $cmlt_er_template_part_args['type'];
$cmlt_er_button_classes = $cmlt_er_template_part_args['classes'];
switch ( $cmlt_er_button_type ) :
	case 'primary':
		$cmlt_er_button_classes = rtrim( 'btn btn-primary flex gap-2 items-center ' . $cmlt_er_button_classes );
		break;
	case 'neutral':
		$cmlt_er_button_classes = rtrim( 'btn btn-neutral flex gap-2 items-center ' . $cmlt_er_button_classes );
		break;
	case 'icon':
		$cmlt_er_button_classes = rtrim( 'flex ' . $cmlt_er_button_classes );
		break;
	default:
		$cmlt_er_button_classes = rtrim( 'flex gap-2 items-center ' . $cmlt_er_button_classes );
		break;
endswitch;

$cmlt_er_attrs = $cmlt_er_template_part_args['attr'];
$cmlt_er_attrs = array_merge( $cmlt_er_attrs, array( 'class' => $cmlt_er_button_classes ) );

// Start button markup with <a> tag.
$cmlt_er_text_html   = $cmlt_er_text_display && ! empty( $cmlt_er_text_content ) ? cmlt_er_content_tag( 'span', $cmlt_er_text_content, array( 'class' => $cmlt_er_text_classes ) ) : '';
$cmlt_er_content     = $cmlt_er_icon_html . $cmlt_er_text_html;
$cmlt_er_button_html = cmlt_er_content_tag(
	'button',
	$cmlt_er_content,
	$cmlt_er_attrs
);

echo $cmlt_er_button_html;//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
