<?php
/**
 * Nota de tapa block partial.
 *
 * This file is responsible for rendering the primary posts.
 *
 * @package El_Resaltador
 * @subpackage Gutenberg
 * @since 1.0.0
 */

get_template_part(
	'template-parts/post/content/content',
	'excerpt',
	array(
		'container' => array(
			'classes' => 'not-prose flex flex-col col-span-1 gap-4 lg:gap-8 lg:flex-row md:col-span-2',
		),
		'thumbnail' => array(
			'container' => array(
				'classes' => 'w-full lg:w-1/2 shrink-0',
			),
			'figure'    => array(
				'classes' => '',
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
					'tag'     => '',
					'link'    => get_the_permalink(),
					'classes' => 'text-3xl text-background',
				),
			),
			'body'      => array(
				'container' => array(
					'classes' => '',
				),
				'excerpt'   => array(
					'display' => true,
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
