<?php
/**
 * Template part for post footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<?php

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args,
	array(
		'container'  => array(
			'classes' => 'max-w-[50rem] mx-auto flex flex-col gap-8',
		),
		'tags'       => array(
			'container' => array(
				'classes' => '',
			),
			'wrapper'   => array(
				'classes' => '',
			),
			'list'      => array(
				'classes' => '',
			),
			'item'      => array(
				'classes' => '',
			),
		),
		'author-box' => array(
			'container' => array(
				'classes' => '',
			),
			'wrapper'   => array(
				'classes' => '',
			),
			'image'     => array(
				'content' => '',
				'classes' => '',
			),
			'name'      => array(
				'classes' => '',
			),
			'bio'       => array(
				'classes' => '',
			),
		),
	)
);

$cmlt_er_container_attr = cmlt_er_generate_attr_string(
	array(
		'class' => $cmlt_er_template_part_args['container']['classes'],
	)
);

?>

<div <?php echo $cmlt_er_container_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">
		<!-- Post Tags  -->
		<?php
			get_template_part(
				'template-parts/post/components/component',
				'tags',
				$cmlt_er_template_part_args['tags']
			)
			?>
		<!-- Post Author Box -->
		<?php
			get_template_part(
				'template-parts/post/components/component',
				'author-box',
				$cmlt_er_template_part_args['author-box']
			)
			?>
		<!-- Latests Posts -->
		<?php
			$cmlt_er_latests_posts      = cmlt_er_get_latest_posts( 'post', 5, get_queried_object_id() );
			$cmlt_er_latests_posts_data = array();
		foreach ( $cmlt_er_latests_posts as $cmlt_er_latest_post ) {
			$cmlt_er_latests_posts_data[] = array(
				'content' => $cmlt_er_latest_post->post_title,
				'link'    => get_the_permalink( $cmlt_er_latest_post->ID ),
			);
		}
			get_template_part(
				'template-parts/global/components/component',
				'listing-title-only',
				array(
					'title'   => array(
						'content' => 'Últimas',
					),
					'listing' => array(
						'container' => array(
							'classes' => 'my-0 relative',
						),
						'wrapper'   => array(
							'classes' => 'flex flex-col',
						),
						'items'     => array(
							'classes' => 'relative py-4 text-xl font-semibold separator-gradient',
							'data'    => $cmlt_er_latests_posts_data,
						),
					),
				)
			)
			?>
</div>