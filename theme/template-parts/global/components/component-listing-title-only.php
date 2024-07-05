<?php
/**
 * Template part for latests post component
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
            'tag'     => 'div',
            'classes' => 'w-full max-w-xl mx-auto flex flex-col px-4 py-16 gradient-primary-soft'
        ],
        'title' => [
            'content' => '',
            'tag'     => 'h2',
            'link'    => '',
            'classes' => 'relative text-2xl my-0 py-4 font-semibold after-title-gradient',
        ],
        'listing' => [
            'container' => [
                'classes' => '',
            ],
            'wrapper'     => [
                'classes' => '',
            ],
            'items'      => [
                'tag'     => 'h4',
                'classes' => '',
                'data'    => []
            ]
        ]
    ]
);

$container_attr = cmlt_er_generate_attr_string( 
    [ 
        'class' => $args['container']['classes'] 
    ] 
);

$title_tag = $args['title']['tag'];
$title_content = $args['title']['content'];
$title_classes = $args['title']['classes'];

$listing = cmlt_er_post_list( $args['listing'] );

if ( !empty( $listing ) ): ?>
    <div <?php echo $container_attr ?>>
        <?php
            echo cmlt_er_content_tag(
                $title_tag,
                esc_html( $title_content ),
                [
                    'class' => $title_classes
                ]
            );
            echo $listing; 
        ?>
    </div>
<?php endif; ?>
