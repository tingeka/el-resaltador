<?php
/**
 * Template part for post footer author box
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
            'classes' => 'w-full max-w-xl mx-auto'
        ],
        'wrapper' => [
            'classes' => 'py-8 px-4 border rounded flex flex-col items-center text-center gap-4'
        ],
        'image'     => [
            'classes' => '',
        ],
        'name'      => [
            'classes' => 'm-0 font-semibold',
        ],
        'bio' => [
            'classes' => '',
        ]
    ]
);

$container_attr = cmlt_er_generate_attr_string( 
    [
        'class' => $args['container']['classes']
    ] 
);

$wrapper_attr = cmlt_er_generate_attr_string(
    [
        'class' => $args['wrapper']['classes']
    ]
)

?>

<div <?php echo $container_attr; ?>>
    <div <?php echo $wrapper_attr; ?>>
        <?php
            get_template_part('template-parts/post/components/component', 'author-image', $args['image'] );
            get_template_part('template-parts/post/components/component', 'author-name', $args['name'] );
            get_template_part('template-parts/post/components/component', 'author-bio', $args['bio'] ); 
        ?>
    </div>
</div>