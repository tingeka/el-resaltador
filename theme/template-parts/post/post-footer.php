<?php
/**
 * Template part for post footer
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
        'wrapper' => [
            'classes'   => '',
        ],
        'author' => [
            'id'        => null,
            'name'      => '',
            'link'      => '',
            'classes'   => '',
        ],
        'date' => [
            'classes'   => '',
        ]
    ]
);

?>

<div class="<?php echo $args['wrapper']['classes'] ?>">
    <?php
    get_template_part( 
        'template-parts/post/post-footer', 
        'author',
        $args['author']
    );
    get_template_part( 
        'template-parts/post/post-footer', 
        'date',
        $args['date']
    );
    ?>
</div>