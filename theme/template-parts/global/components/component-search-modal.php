<?php
/**
 * Template part for search modal.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

$cmlt_er_template_part_args = cmlt_er_recursive_parse_args(
	$args ?? array(),
	array()
);

?>
<!-- 1. The dialog container -->
<div
	id="search-modal"
	data-a11y-dialog="search-modal"
	aria-labelledby="search-modal-title"
	aria-hidden="true"
	class="fixed inset-0 z-[999] flex overflow-y-auto aria-hidden:hidden"
>
	<!-- 2. The dialog overlay -->
	<div 
	data-a11y-dialog-hide
	class="fixed inset-0 z-40 overflow-y-auto bg-foreground/70"
	>
	</div>
	<!-- 3. The actual dialog -->
		<div role="document" class="relative z-40 w-full bg-background px-4 py-8 md:w-1/3">
		<!-- 4. The close button -->
			<!-- <button type="button" data-a11y-dialog-hide aria-label="Cerrar" class="absolute top-0 right-0 p-4 focus:outline-none">
				&times;
			</button> -->
			<?php
				get_template_part(
					'template-parts/global/components/component',
					'button',
					array(
						'type'    => 'icon',
						'classes' => 'absolute top-0 right-0 p-4 focus:outline-none',
						'icon'    => array(
							'display' => true,
							'type'    => 'solid',
							'name'    => 'circle-xmark',
							'id'      => 'cmlt_er_fa_solid_circle-xmark',
							'size'    => 'lg',
							'classes' => '',
						),
						'attr'    => array(
							'type'                  => 'button',
							'data-a11y-dialog-hide' => '',
							'aria-label'            => 'Cerrar',
						),
					)
				)
				?>
			<!-- 5. The dialog title -->
			<h2 id="search-modal-title" class="separator-gradient text-2xl font-bold">Buscar</h2>
			<!-- 6. Dialog content -->
			<div class="relative z-10 m-auto bg-foreground">
				<div class="my-4 bg-background">
					<?php
						get_search_form();
					?>
				</div>
			</div>
		</div>
</div>