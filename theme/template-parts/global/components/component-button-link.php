<?php
/**
 * Template part for button, link variant.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args ?? array(),
	array(
		'type' => '',
		'link' => array(
			'url'     => '',
			'title'   => '',
			'target'  => '',
			'classes' => '',
		),
		'icon' => array(
			'display' => false,
			'type'    => '',
			'name'    => '',
			'id'      => '',
			'size'    => '',
			'classes' => '',
		),
		'text' => array(
			'display' => false,
			'content' => '',
			'classes' => '',
		),
	)
);

$cmlt_er_link_url     = $cmlt_er_template_part_args['link']['url'];
$cmlt_er_link_title   = $cmlt_er_template_part_args['link']['title'];
$cmlt_er_link_target  = $cmlt_er_template_part_args['link']['target'];
$cmlt_er_link_classes = $cmlt_er_template_part_args['link']['classes'];

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

$cmlt_er_link_type = $cmlt_er_template_part_args['type'];
switch ( $cmlt_er_link_type ) :
	case 'primary':
		$cmlt_er_link_classes = implode( ' ', array( 'btn btn-primary flex gap-2 items-center' . $cmlt_er_link_classes ) );
		break;
	case 'neutral':
		$cmlt_er_link_classes = implode( ' ', array( 'btn btn-neutral flex gap-2 items-center' . $cmlt_er_link_classes ) );
		break;
	case 'icon':
		$cmlt_er_link_classes = implode( ' ', array( 'flex' . $cmlt_er_link_classes ) );
		break;
	default:
		$cmlt_er_link_classes = implode( ' ', array( 'flex gap-2 items-center', $cmlt_er_link_classes ) );
		break;
endswitch;

// Start button markup with <a> tag.
$cmlt_er_text_html = $cmlt_er_text_display && ! empty( $cmlt_er_text_content ) ? cmlt_er_content_tag( 'span', esc_html( $cmlt_er_text_content ), array( 'class' => $cmlt_er_text_classes ) ) : '';
$cmlt_er_content   = $cmlt_er_icon_html . $cmlt_er_text_html;
$cmlt_er_link_html = cmlt_er_content_tag(
	'a',
	$cmlt_er_content,
	array(
		'href'   => $cmlt_er_link_url,
		'title'  => $cmlt_er_link_title,
		'target' => $cmlt_er_link_target,
		'class'  => $cmlt_er_link_classes,
	)
);

echo $cmlt_er_link_html;//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
