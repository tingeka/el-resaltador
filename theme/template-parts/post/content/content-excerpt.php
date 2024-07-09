<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<?php 
    $args = cmlt_er_recursive_parse_args(
        $args,
        [
            'category' => [
                'container' => [
                    'classes' => ''
                ],
                'wrapper' => [
                    'classes' => ''
                ],
                'list' => [
                    'classes' => ''
                ],
                'item' => [
                    'classes' => ''
                ]
            ],
            'title' => [
                'container' => [
                    'classes' => ''
                ],
                'wrapper' => [
                    'classes' => ''
                ],
                'list' => [
                    'classes' => ''
                ],
                'item' => [
                    'classes' => ''
                ]
            ],
            'excerpt' => [
                'content' => get_the_excerpt(),
                'classes' => '',
            ],
            'footer' => [
                'container' => [
                    'classes'   => 'flex gap-2 text-sm',
                ],
                'author' => [
                    'content'   => '',
                    'link'      => '',
                    'classes'   => '',
                ],
                'date' => [
                    'classes'   => '',
                ]
            ]
        ]
    );
    
    $footer_container_attr = cmlt_er_generate_attr_string( 
        [ 
            'class' => $args['footer']['container']['classes'] 
        ] 
    );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'flex flex-col md:flex-row gap-8 max-w-screen-xl mx-auto my-8'); ?>>
    <section class="w-full shrink-0 md:w-80 md:aspect-video">
        <?php 
            cmlt_er_post_thumbnail( 
                [
                    'figure' => [
                        'classes' => ''
                    ],
                    'link' => [
                        'classes' => 'flex w-full aspect-video'
                    ],
                    'image' => [
                        'size' => 'large',
                        'classes' => 'object-cover'
                    ]
                ] 
            ); 
        ?>
    </section>
    <section class="flex flex-col gap-4 w-full grow">
        <header class="entry-header">
            <?php
                /* Post Heading */
                get_template_part( 
                    'template-parts/post/components/heading', 
                    '', 
                    $args['title']
                ); 
            ?>
        </header><!-- .entry-header -->
        <section>
            <?php 
                /* Post Excerpt */
                get_template_part( 
                    'template-parts/post/components/excerpt', 
                    '', 
                    $args['excerpt']
                ); 
            ?>
        </section>
        <footer <?php echo $footer_container_attr ?>>
            <?php
                get_template_part( 
                    'template-parts/post/components/date', 
                    '',
                    $args['footer']['date']
                );
                get_template_part( 
                    'template-parts/post/components/author', 
                    'name',
                    $args['footer']['author']
                );
            ?>
        </footer>
    </section>

	<?php 
    // cmlt_er_post_thumbnail(); 
    ?>

	
    <!-- 
        <div <?php // cmlt_er_content_class( 'entry-content' ); ?>> 
		<?php //the_excerpt(); ?>
	</div>
    -->
    <!-- .entry-content -->

	<!-- <footer class="entry-footer"> -->
		<?php // cmlt_er_entry_footer(); ?>
	<!-- </footer> -->

</article><!-- #post-${ID} -->
