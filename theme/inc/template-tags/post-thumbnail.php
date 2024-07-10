<?php

if ( ! function_exists( 'cmlt_er_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail, wrapping the post thumbnail in an
	 * anchor element except when viewing a single post.
	 */
	function cmlt_er_post_thumbnail( $args = [] ) {
        
        $args = cmlt_er_recursive_parse_args(
            $args,
            [
                'figure' => [
                    'classes' => ''
                ],
                'link' => [
                    'classes' => ''
                ],
                'image' => [
                    'size' => 'post-thumbnail',
                    'classes' => ''
                ]
            ]
        );
        // var_dump($args);
		if ( ! cmlt_er_can_show_post_thumbnail() ) {
			return;
		}

		if ( is_singular() && !is_front_page() ) :
            echo cmlt_er_content_tag(
                'figure',
                get_the_post_thumbnail(
                    get_the_ID(),
                    $args['image']['size'],
                    [ 
                        'class' => $args['image']['classes'] 
                    ]
                ),
                [
                   'class' => rtrim( 'post-thumbnail ' . $args['figure']['classes'] ),
                ]
            );

		else:

            $link = get_the_permalink();
            
            $link_html = cmlt_er_content_tag(
                'a',
                get_the_post_thumbnail(
                    get_the_ID(),
                    $args['image']['size'],
                    [ 
                        'class' => rtrim( 'post-thumbnail-image ' . $args['image']['classes'] ), 
                    ]
                ),
                [
                    'href' => $link,
                    'class' => rtrim( 'post-thumbnail-link ' . $args['link']['classes'] ),
                    'aria-hidden' => 'true',
                    'tabindex' => '-1'
                ]
            );

            $figure = cmlt_er_content_tag(
                'figure',
                $link_html,
                [
                   'class' => rtrim( 'post-thumbnail ' . $args['figure']['classes'] ),
                ]
            );

            echo $figure;

		endif; // End is_singular().

	}
    
endif;