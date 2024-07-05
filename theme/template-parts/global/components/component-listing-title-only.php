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
            'classes' => 'w-full max-w-xl mx-auto flex flex-col gap-4 px-4 py-16 gradient-primary-soft'
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

$container_classes = esc_attr( $args['container']['classes'] );

$title_tag = esc_attr($args['title']['tag']);
$title_content = esc_html($args['title']['content']);
$title_classes = esc_attr($args['title']['classes']);

$listing = cmlt_er_post_list( $args['listing'] );

if ( !empty( $listing ) ): ?>
    <div <?php echo cmlt_er_generate_attr_string( [ 'class' => $container_classes ] ) ?>>
        <?php
            echo cmlt_er_content_tag(
                $title_tag,
                $title_content,
                [
                    'class' => $title_classes
                ]
            );
            echo $listing; 
        ?>
    </div>
<?php endif; ?>
