<?php
/**
 * Template part for breadcrumbs template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<?php

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args ?? array(),
	array(
		'container'   => array(
			'classes' => 'flex flex-col gap-1',
		),
		'title'       => array(
			'content' => '',
			'classes' => '',
		),
		'breadcrumbs' => array(
			'display' => false,
			'classes' => '',
		),
		'excerpt'     => array(
			'display' => false,
			'content' => '',
			'classes' => '',
		),
		'search_form' => array(
			'display' => false,
		),
	)
);

$cmlt_er_container_classes = $cmlt_er_template_part_args['container']['classes'];
$cmlt_er_container_attr    = cmlt_er_generate_attr_string(
	array(
		'class' => rtrim( 'page-header ' . $cmlt_er_container_classes ),
	)
);

$cmlt_er_header_title      = $cmlt_er_template_part_args['title']['content'];
$cmlt_er_header_title_html = cmlt_er_content_tag(
	'h1',
	$cmlt_er_header_title,
	array(
		'class' => 'page-title',
	)
);

$cmlt_er_show_breadcrumbs = $cmlt_er_template_part_args['breadcrumbs']['display'];
$cmlt_er_breadcrumbs_args = $cmlt_er_template_part_args['breadcrumbs'];

?>

<header <?php echo $cmlt_er_container_attr; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php
	if ( $cmlt_er_show_breadcrumbs ) :
		get_template_part( 'template-parts/global/components/component', 'breadcrumbs', $cmlt_er_breadcrumbs_args );
		endif;
	?>
	<?php echo $cmlt_er_header_title_html; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<div class="mt-2 max-w-2xl">
	<?php
	if ( $cmlt_er_template_part_args['search_form']['display'] ) :
			get_search_form();
			endif;
	?>
	</div>
	<?php
	if ( $cmlt_er_template_part_args['excerpt']['display'] ) {

		$cmlt_er_excerpt_content = '' !== $cmlt_er_template_part_args['excerpt']['content']
		? cmlt_er_content_tag(
			'p',
			esc_html( $cmlt_er_template_part_args['excerpt']['content'] ),
			array(
				'class' => $cmlt_er_template_part_args['excerpt']['classes'],
			)
		)
		: '';

		echo $cmlt_er_excerpt_content; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
	?>
</header><!-- .page-header -->