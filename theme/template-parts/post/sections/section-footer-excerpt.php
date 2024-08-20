<?php
/**
 * Template part for displaying post footer in excerpt format
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
			'classes' => 'flex gap-2 text-sm',
		),
		'author'    => array(
			'classes' => '',
		),
		'date'      => array(
			'classes' => '',
		),
	)
);

$cmlt_er_container_attr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['container']['classes'],
	)
);


?>

<footer <?php echo $cmlt_er_container_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php
		get_template_part(
			'template-parts/post/components/component',
			'date',
			$cmlt_er_template_part_args['date']
		);
		get_template_part(
			'template-parts/post/components/component',
			'author-name',
			$cmlt_er_template_part_args['author']
		);
		?>
</footer><!--.entry-footer -->