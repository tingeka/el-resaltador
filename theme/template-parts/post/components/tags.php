<?php
/**
 * Template part for displaying post tags
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

 ?>
<?php 

$args = wp_parse_args(
    $args,
    [   
        'content'          => [],
        'container'     => [
            'classes' => ''
        ],
        'wrapper'       => [
            'classes' => ''
        ],
        'list'          => [
            'classes' => ''
        ],
        'item'          => [
            'classes' => ''
        ]
    ]
);

$tag_links = array();
foreach ( $args['content'] as $tag ) {
    $tag_links[] = sprintf(
        '<li><a href="%1$s" class="%2$s">%3$s</a>%4$s</li>',
        esc_url( get_tag_link( $tag->term_id ) ),
        esc_attr( $args['item']['classes'] ),
        esc_html( $tag->name ),
        $tag === end($args['content']) ? '' : ', '
    );
}
$tags_list = sprintf(
    '<ul class="%1$s">%2$s</ul>',
    esc_attr( $args['list']['classes'] ),
    join( '', $tag_links )
);

$tags_wrapper = sprintf(
    '<div class="%1$s">%2$s: %3$s</div>',
    esc_attr( $args['wrapper']['classes'] ),
    esc_html__( 'Etiquetas', 'el-resaltador' ),
    $tags_list
);
// Output the tags list
$tags_container = sprintf(
    '<div class="%1$s">%2$s</div>',
    esc_attr( $args['container']['classes'] ),
    $tags_wrapper
);

echo $tags_container;

?>


