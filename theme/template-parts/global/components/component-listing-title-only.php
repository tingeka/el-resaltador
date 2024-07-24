<?php
/**
 * Template part for latests post component
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args,
	array(
		'container' => array(
			'tag'     => 'div',
			'classes' => 'w-full max-w-xl mx-auto flex flex-col px-4 py-16 gradient-primary-soft',
		),
		'title'     => array(
			'content' => '',
			'tag'     => 'h2',
			'link'    => '',
			'classes' => 'relative text-2xl my-0 py-4 font-semibold separator-gradient',
		),
		'listing'   => array(
			'container' => array(
				'classes' => '',
			),
			'wrapper'   => array(
				'classes' => '',
			),
			'items'     => array(
				'tag'     => 'h4',
				'classes' => '',
				'data'    => array(),
			),
		),
	)
);

$cmlt_er_container_attr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['container']['classes'],
	)
);

$cmlt_er_title_tag     = $cmlt_er_template_part_args['title']['tag'];
$cmlt_er_title_content = $cmlt_er_template_part_args['title']['content'];
$cmlt_er_title_classes = $cmlt_er_template_part_args['title']['classes'];

$cmlt_er_listing = cmlt_er_post_list( $cmlt_er_template_part_args['listing'] );

if ( ! empty( $cmlt_er_listing ) ) :
	?>
	<div <?php echo $cmlt_er_container_attr;//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
			echo cmlt_er_content_tag(//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				$cmlt_er_title_tag,
				esc_html( $cmlt_er_title_content ),
				array(
					'class' => $cmlt_er_title_classes,
				)
			);
			echo $cmlt_er_listing;//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
	</div>
<?php endif; ?>
