<?php
/**
 * Ajax Load More Template
 *
 * This file is responsible for handling the template
 * for the default Ajax Load More output.
 *
 * @package El_Resaltador
 * @since 1.0.0
 */

?>

<li class="not-prose m-0 mb-8 list-none">
<?php
get_template_part(
	'template-parts/post/content/content',
	'excerpt',
	array(
		'container' => array(
			'classes' => 'not-prose px-4 flex flex-col gap-4 md:gap-8 md:flex-row',
		),
		'thumbnail' => array(
			'container' => array(
				'classes' => 'w-full shrink-0 md:w-1/2 lg:max-w-64 rounded-md overflow-hidden',
			),
			'figure'    => array(
				'classes' => 'h-full',
			),
			'link'      => array(
				'classes' => 'flex h-full w-full aspect-video',
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
					'mode'    => 'light',
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
					'classes' => 'text-2xl text-foreground',
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
					'classes' => '',
				),
				'date'      => array(
					'classes' => '',
				),
			),
		),
	)
);
?>
</li>