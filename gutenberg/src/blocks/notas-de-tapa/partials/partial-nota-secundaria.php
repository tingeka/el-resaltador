<?php
/**
 * Nota de tapa block partial.
 *
 * This file is responsible for rendering the secondary posts.
 *
 * @package El_Resaltador
 * @subpackage Gutenberg
 * @since 1.0.0
 */

$cmlt_er_single         = $cmlt_er_nota_de_tapa_query->post_count <= 2;
$cmlt_er_single_classes = $cmlt_er_single ? 'md:col-span-2' : 'lg:col-span-1';

get_template_part(
	'template-parts/post/content/content',
	'excerpt',
	array(
		'container' => array(
			'classes' => 'not-prose flex flex-col gap-4 md:gap-8 lg:flex-row ' . $cmlt_er_single_classes,
		),
		'thumbnail' => array(
			'container' => array(
				'classes' => 'w-full shrink-0 lg:w-64',
			),
			'figure'    => array(
				'classes' => 'rounded-md overflow-hidden',
			),
			'link'      => array(
				'classes' => 'flex w-full aspect-video',
			),
			'image'     => array(
				'size'    => 'large',
				'classes' => 'object-cover',
			),
		),
		'content'   => array(
			'container' => array(
				'classes' => 'flex flex-col gap-4 w-full grow',
			),
			'header'    => array(
				'category' => array(
					'mode'    => 'dark',
					'display' => true,
					'ul'      => array(
						'classes' => '',
					),
					'li'      => array(
						'classes' => '',
					),
					'a'       => array(
						'classes' => '',
					),
				),
				'title'    => array(
					'content' => '',
					'tag'     => 'h2',
					'link'    => get_the_permalink(),
					'classes' => 'text-2xl text-background',
				),
			),
			'body'      => array(
				'container' => array(
					'classes' => '',
				),
				'excerpt'   => array(
					'display' => false,
					'content' => '',
					'classes' => '',
				),
			),
			'footer'    => array(
				'container' => array(
					'classes' => '',
				),
				'author'    => array(
					'classes' => 'm-0 text-background/70',
				),
				'date'      => array(
					'classes' => 'm-0 text-background/70',
				),
			),
		),
	)
);
