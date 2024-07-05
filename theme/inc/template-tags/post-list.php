<?php
/**
 * Template tag for rendering posts as a list.
 *
 * @param array $args Array of arguments for customizing the component.
 * @return string Generated HTML for the latest posts component.
 */
if (! function_exists( 'cmlt_er_post_list' ) ) {
    function cmlt_er_post_list( $args = [] ) {
        // Extract specific keys from $args or initialize as empty arrays
        $items_container_classes = isset($args['container']['classes']) ? esc_attr($args['container']['classes']) : '';
        $items_wrapper_classes = isset($args['wrapper']['classes']) ? esc_attr($args['wrapper']['classes']) : '';
        $items_tag = isset($args['items']['tag']) ? esc_attr($args['items']['tag']) : '';
        $items_classes = isset($args['items']['classes']) ? esc_attr($args['items']['classes']) : '';
        $items_data = isset($args['items']['data']) ? $args['items']['data'] : array();

        // Bail if no items
        if (empty($items_data)) {
            return '';
        }

        // Prepare Items HTML
        $items_html = '';
        foreach ($items_data as $item) {
            $item_content = !empty($item['link'])
                ? cmlt_er_content_tag(
                    'a',
                    cmlt_er_content_tag(
                        $items_tag,
                        esc_html($item['content']),
                        array()
                    ),
                    array(
                        'href' => esc_url($item['link']),
                    )
                )
                : cmlt_er_content_tag(
                    $items_tag,
                    esc_html($item['content']),
                    array()
                );

            $item_html = cmlt_er_content_tag(
                'li',
                $item_content,
                array(
                    'class' => $items_classes,
                )
            );
            $items_html .= $item_html;
        }

        // Prepare Items Wrapper HTML
        $items_wrapper_html = cmlt_er_content_tag(
            'ul',
            $items_html,
            array(
                'class' => $items_wrapper_classes,
            )
        );

        // Prepare Items Container HTML
        $items_container_html = cmlt_er_content_tag(
            'div',
            $items_wrapper_html,
            array(
                'class' => $items_container_classes,
            )
        );

        // Return the component HTML
        return $items_container_html;
    }
}

