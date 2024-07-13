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
    
    $args = cmlt_er_recursive_parse_args(
        $args,
        [   
            'classes'   => 'text-foreground/70',
        ]
    );

    $classes = $args['classes'];

    echo cmlt_er_posted_on( $classes );
    
?>