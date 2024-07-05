<?php
/**
 * Retrieves the first category link for the current post.
 *
 * @param string $classes Optional. CSS classes to apply to the category link.
 * @return string The HTML for the first category link, or an empty string if no categories are found.
 */
if ( ! function_exists( 'cmlt_er_first_category_link' ) ) :
    function cmlt_er_first_category_link( $classes = '' ) {
        // Get the first category of the post
        $category = get_the_category();
        if (!empty($category)) {
            $category = $category[0];
            $category_link = get_category_link($category);
            $category_name = $category->cat_name;
    
            // Output the HTML with localized and escaped category name
            $first_category_html = cmlt_er_content_tag(
                'a',
                esc_html__( $category_name, 'el-resaltador' ),
                [
                    'href' => esc_url($category_link),
                    'class' => esc_attr($classes)
                ]
            );
            return $first_category_html;
        }
    }
endif;