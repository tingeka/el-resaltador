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
 * @param array $cmlt_er_template_part_args {
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
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args,
	array(
		'mode'    => 'light',
		'display' => true,
		'ul'      => array(
			'classes' => 'm-0 p-0 list-none font-mono',
		),
		'li'      => array(
			'classes' => 'p-0',
		),
		'a'       => array(
			'classes' => 'post-cat',
		),
	)
);

$cmlt_er_variation = $cmlt_er_template_part_args['mode'];

switch ( $cmlt_er_variation ) :
	case 'dark':
		$cmlt_er_a_classes = $cmlt_er_template_part_args['a']['classes'] . ' post-cat-dark';
		break;
	case 'light':
		$cmlt_er_a_classes = $cmlt_er_template_part_args['a']['classes'] . ' post-cat-light';
		break;
endswitch;

$cmlt_er_display_category = $cmlt_er_template_part_args['display'];

$cmlt_er_ul_classes = $cmlt_er_template_part_args['ul']['classes'];
$cmlt_er_li_classes = $cmlt_er_template_part_args['li']['classes'];

if ( $cmlt_er_display_category ) :
	?>

	<ul 
		<?php
			echo cmlt_er_generate_attr_string( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				array(
					'class' => $cmlt_er_ul_classes,
				)
			)
		?>
	>
		<li 
			<?php
				echo cmlt_er_generate_attr_string( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					array(
						'class' => $cmlt_er_li_classes,
					)
				)
			?>
		>
			<?php
				echo cmlt_er_first_category_link( $cmlt_er_a_classes ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</li>
	</ul>
<?php endif; ?>