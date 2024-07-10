<?php
/**
 * Template part for breadcrumbs template
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
        'container' => [
            'classes' => 'flex flex-col gap-1',
        ],
        'title' => [
            'content' => '',
            'classes' => '',
        ],
        'breadcrumbs' => [
            'display' => false,
            'classes' => '',
        ]
    ]
);

$container_classes = $args['container']['classes'];
$container_atrr = cmlt_er_generate_attr_string( 
    [ 
        'class' => rtrim( 'page-header ' . $container_classes ), 
    ] 
);
 
$title = $args['title']['content'];
$title_html = cmlt_er_content_tag( 
    'h1',
    $title,
    [
        'class' => 'page-title',
    ]
    );

$show_breadcrumbs = $args['breadcrumbs']['display'];
$breadcrumbs_args = $show_breadcrumbs ? $args['breadcrumbs'] : []; // fix this, doesnt make sense

?>

<header <?php echo $container_atrr; ?>>
    <?php
        if ( $show_breadcrumbs ) :
            get_template_part( 'template-parts/global/components/component', 'breadcrumbs', $breadcrumbs_args );
        endif;
    ?>
    <?php echo $title_html; ?>
</header><!-- .page-header -->