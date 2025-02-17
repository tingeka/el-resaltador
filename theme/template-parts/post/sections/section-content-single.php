<?php
/**
 * Template part for displaying post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<?php

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args ?? array(),
	array(),
);

?>
<?php do_action( 'cmlt_er_action_post_after_header' ); ?>
<section class="flex flex-col justify-between gap-4 xl:mx-auto xl:max-w-screen-xl xl:flex-row">
	<!--  Share column -->
	<div class="mx-auto flex w-full max-w-xl xl:mx-0 xl:max-w-72">
		<!-- Share column wrapper -->
		<div class="social-share__wrapper ">
			<!-- Share column content -->
			<?php echo do_shortcode( '[scriptless heading=""]' ); ?>
		</div>
	</div>
	<!--  Post content column -->
	<div class="relative">
		<!-- Post content -->
		<div <?php cmlt_er_content_class( 'entry-content py-8 mt-8 mx-auto border-t xl:p-8 xl:px-0' ); ?>>
			<?php the_content(); ?>
		</div>
	</div>
	<div class="mx-auto flex w-full max-w-xl flex-col gap-8 xl:mx-0 xl:mt-8 xl:max-w-72">
		<!-- Right column content -->
		<?php
			get_template_part(
				'template-parts/global/components/component',
				'cta',
				array(
					'mode' => 'light',
				)
			)
			?>
		<?php do_action( 'cmlt_er_action_post_sidebar' ); ?>
	</div>
</section>