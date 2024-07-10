<?php
/**
 * Renders a list of categories for the current post.
 *
 * This template part is responsible for displaying the categories associated with the current post.
 * It uses the `cmlt_er_recursive_parse_args()` function to merge the provided arguments with default values,
 * and then generates the necessary HTML structure to display the categories.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 * 
 * @param array $args {
 *   An associative array of arguments.
 *
 *   @type array $ul {
 *       An associative array of classes to apply to the outer `<ul>` element.
 *   }
 *   @type array $li {
 *       An associative array of classes to apply to the `<li>` elements.
 *    }
 *   @type array $a {
 *       An associative array of classes to apply to the category links (`<a>` elements).
 *   }
 * }
 * 
 */

 ?>

<?php
$args = cmlt_er_recursive_parse_args(
    $args,
    [
        'mode' => 'light',
        'display' => true,
        'ul' => [
            'classes' => 'm-0 p-0 list-none font-mono',
        ],
        'li' => [
            'classes' => 'p-0',
        ],
        'a' => [
            'classes' => 'relative border-image-gradient',
        ]
    ]
);

$mode = $args['mode'];

switch ( $mode ):
    case 'dark':
        $a_classes = $args['a']['classes'] . ' border-image-gradient-primary text-background';
        break;
    default:
        $a_classes = $args['a']['classes'] . ' border-image-gradient-foreground text-foreground';
        break;
endswitch;

$display_category = $args['display'];

$ul_classes = $args['ul']['classes'];
$li_classes = $args['li']['classes'];

if ( $display_category ): ?>

    <ul 
        <?php 
            echo cmlt_er_generate_attr_string(
                [
                    'class' => $ul_classes
                ]
            )
        ?>
    >
        <li 
            <?php
                echo cmlt_er_generate_attr_string(
                    [
                        'class' => $li_classes
                    ]
                )
            ?>
        >
            <?php 
                echo cmlt_er_first_category_link( $a_classes )
            ?>
        </li>
    </ul>
<?php endif; ?>