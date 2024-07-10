<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

get_header();
?>

	<section id="primary">
		<main id="main">

		<?php if ( have_posts() ) : ?>

			<?php
				get_template_part( 
					'template-parts/global/sections/section', 
					'page-header', 
					[
						'title' => [
							'content' => cmlt_er_get_the_archive_title(),
						],
						'breadcrumbs' => [
							'display' => true,
						]
					] 
				); 
			?>
			<section class="flex flex-col gap-8 max-w-screen-xl mx-auto lg:flex-row px-4">
				<div>
					<?php
						// Start the Loop.
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/post/content/content', 'excerpt', [
								'content' => [
									'header' => [
										'category' => [
											'display' => false,
										]
									]
								]
							]);

							// End the loop.
						endwhile;

						// Previous/next page navigation.
						cmlt_er_the_posts_navigation();

					else :

						// If no content, include the "No posts found" template.
						get_template_part( 'template-parts/content/content', 'none' );

					endif;
					?>
				</div>
				<div>
					<?php
						get_template_part( 
							'template-parts/global/components/component', 
							'cta',
							[]
						) 
					?>
				</div>
			</section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
