<?php
/**
 * Template part for CTA global component.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<?php
$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args ?? array(),
	array(
		'mode' => 'dark',
	)
);

switch ( $cmlt_er_template_part_args['mode'] ) :
	case 'dark':
		$cmlt_er_container_classes = 'bg-foreground text-background';
		$cmlt_er_span_border_color = 'border-background';
		$cmlt_er_isologo           = get_template_directory_uri() . '/assets/isologo_blanco.svg';
		break;
	default:
		$cmlt_er_container_classes = 'bg-primary-50';
		$cmlt_er_span_border_color = 'border-foreground';
		$cmlt_er_isologo           = get_template_directory_uri() . '/assets/isologo.svg';
		break;
endswitch;
?>

<div class="flex rounded p-4 py-16 <?php echo $cmlt_er_container_classes;//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">
	<div class="flex w-full flex-col items-start gap-4">
		<?php
		echo cmlt_er_content_tag(//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'img',
			'',
			array(
				'src' => $cmlt_er_isologo,
				'alt' => 'Logo El Resaltador',
			)
		);
		?>
		<p 
			class="font-heading text-2xl font-bold"
			>
			Apoya el periodismo 
			<span 
				class="rounded border p-1 <?php echo esc_attr( $cmlt_er_span_border_color ); ?>"
				>
				autogestionado
			</span>
		</p>
		<p>La comunicación la construimos entre todxs.</p>
		<a href="/suscribite" class="btn btn-primary">Suscribite acá</a>
	</div>
</div>