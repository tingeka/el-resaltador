<?php
/**
 * Template part for post footer author box
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args ?? array(),
	array(
		'container' => array(
			'classes' => 'w-full max-w-xl mx-auto',
		),
		'wrapper'   => array(
			'classes' => 'py-8 px-4 border rounded flex flex-col items-center text-center gap-4',
		),
		'image'     => array(
			'classes' => '',
		),
		'name'      => array(
			'classes' => 'm-0 font-semibold',
		),
		'bio'       => array(
			'classes' => '',
		),
	)
);

$cmlt_er_container_attr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['container']['classes'],
	)
);

$cmlt_er_wrapper_attr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['wrapper']['classes'],
	)
)

?>

<div <?php echo $cmlt_er_container_attr;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div <?php echo $cmlt_er_wrapper_attr;  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
			get_template_part( 'template-parts/post/components/component', 'author-image', $cmlt_er_template_part_args['image'] );
			get_template_part( 'template-parts/post/components/component', 'author-name', $cmlt_er_template_part_args['name'] );
			get_template_part( 'template-parts/post/components/component', 'author-bio', $cmlt_er_template_part_args['bio'] );
		?>
	</div>
</div>