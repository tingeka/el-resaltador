<?php
/**
 * Template part for post footer date
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
            'link'      => null,
            'classes'   => '',
        ]
    );
    cmlt_er_posted_on( $args['classes'], $args['link'] );
?>