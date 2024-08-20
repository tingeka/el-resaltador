<?php
/**
 * Template part for displaying post content in excerpt format
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
		'container' => array(
			'classes' => 'flex flex-col gap-2',
		),
		'excerpt'   => array(
			'display' => true,
			'content' => '',
			'classes' => '',
		),
	)
);

$cmlt_er_container_attr = cmlt_er_generate_attr_string(
	array(
		'class' => rtrim( 'entry-body ' . $cmlt_er_template_part_args['container']['classes'] ),
	)
);

$cmlt_er_display_excerpt = $cmlt_er_template_part_args['excerpt']['display'];

if ( $cmlt_er_display_excerpt ) :
	?>
	<section <?php echo $cmlt_er_container_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
			/* Post Excerpt */
			get_template_part(
				'template-parts/post/components/component',
				'excerpt',
				$cmlt_er_template_part_args['excerpt']
			);
		?>
	</section><!--.entry-body -->
<?php endif; ?>