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
					array(
						'title'       => array(
							'content' => cmlt_er_get_the_archive_title(),
						),
						'breadcrumbs' => array(
							'display' => true,
						),
					)
				);
			?>
			<section class="mx-auto flex max-w-screen-xl flex-col gap-8 px-4 lg:flex-row">
				<div>
					<?php
						// Start the Loop.
					while ( have_posts() ) :
						the_post();
						get_template_part(
							'template-parts/post/content/content',
							'excerpt',
							array(
								'content' => array(
									'header' => array(
										'category' => array(
											'display' => false,
										),
									),
								),
							)
						);

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
							array()
						)
						?>
				</div>
			</section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
