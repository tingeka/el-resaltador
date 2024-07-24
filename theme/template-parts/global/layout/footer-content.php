<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<?php
	$cmlt_er_social_media = array(
		'facebook'  => array(
			'link' => array(
				'title' => 'Seguínos en Facebook',
				'url'   => 'https://www.facebook.com/elresaltador/',
			),
			'icon' => array(
				'type' => 'brands',
				'name' => 'square-facebook',
				'id'   => 'cmlt_er_fa_brands_square-facebook',
			),
		),
		'instagram' => array(
			'link' => array(
				'title' => 'Seguínos en Instagram',
				'url'   => 'https://www.instagram.com/el_resaltador/',
			),
			'icon' => array(
				'type' => 'brands',
				'name' => 'square-instagram',
				'id'   => 'cmlt_er_fa_brands_square-instagram',
			),
		),
		'x'         => array(
			'link' => array(
				'title' => 'Seguínos en Twitter',
				'url'   => 'https://www.x.com/el_resaltadorok/',
			),
			'icon' => array(
				'type' => 'brands',
				'name' => 'square-x-twitter',
				'id'   => 'cmlt_er_fa_brands_square-x-twitter',
			),
		),
		'youtube'   => array(
			'link' => array(
				'title' => 'Seguínos en YouTube',
				'url'   => 'https://www.youtube.com/channel/UCrBeBcO7r1TQDWAP88wObcg',
			),
			'icon' => array(
				'type' => 'brands',
				'name' => 'square-youtube',
				'id'   => 'cmlt_er_fa_brands_square-youtube',
			),
		),
	);

	$cmlt_er_menu_location = 'menu-2';
	$cmlt_er_menu_items    = cmlt_er_get_menu_array( $cmlt_er_menu_location ) ? cmlt_er_get_menu_array( $cmlt_er_menu_location ) : array();
	?>

<footer id="colophon">
	<section class="flex flex-col md:flex-row gap-8 justify-between w-full max-w-screen-2xl mx-auto bg-foreground text-background py-16 px-4 lg:px-8">
		<div class="flex flex-col gap-4">
			<a href="/">
			<?php
			echo cmlt_er_content_tag(//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'img',
				'',
				array(
					'src' => get_template_directory_uri() . '/assets/isologo_blanco.svg',
					'alt' => 'Logo El Resaltador',
				)
			);
			?>
			</a>
			<p>Cooperativa de Trabajo El Resaltador Ltda.</p>
			<div class="flex gap-4">
				<?php
				foreach ( $cmlt_er_social_media as $cmlt_er_network ) :

					$cmlt_er_network_url       = $cmlt_er_network['link']['url'];
					$cmlt_er_network_url_title = $cmlt_er_network['link']['title'];

					$cmlt_er_network_icon_type = $cmlt_er_network['icon']['type'];
					$cmlt_er_network_icon_name = $cmlt_er_network['icon']['name'];
					$cmlt_er_network_icon_id   = $cmlt_er_network['icon']['id'];

					get_template_part(
						'template-parts/global/components/component-button',
						'link',
						array(
							'type' => 'icon',
							'link' => array(
								'url'    => $cmlt_er_network_url,
								'title'  => $cmlt_er_network_url_title,
								'target' => '_blank',
							),
							'icon' => array(
								'display' => true,
								'type'    => $cmlt_er_network_icon_type,
								'name'    => $cmlt_er_network_icon_name,
								'id'      => $cmlt_er_network_icon_id,
								'size'    => 'xl',
								'classes' => 'fill-background',
							),
							'text' => array(
								'display' => false,
							),
						)
					);
					endforeach;
				?>
			</div>
		</div>
		<div class="flex items-center" id="footer-menu-wrapper">
				<!-- For mobile, list style -->
				<ul class="w-full flex flex-col sm:flex-row gap-4">
					<?php foreach ( $cmlt_er_menu_items as $cmlt_er_menu_item ) : ?>
						<?php if ( ! empty( $cmlt_er_menu_item['children'] ) ) : ?>
							<li class="navbar-footer-item navbar-footer-item--has-children">
								<span>
									<?php echo esc_html( $cmlt_er_menu_item['title'] ); ?>
								</span>
								<ul class="navbar-footer-item__sub-item">
									<?php foreach ( $cmlt_er_menu_item['children'] as $cmlt_er_menu_item_child ) : ?>
										<li>
											<a href="<?php echo esc_url( $cmlt_er_menu_item_child['url'] ); ?>">
												<span>
													<?php echo esc_html( $cmlt_er_menu_item_child['title'] ); ?>
												</span>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php else : ?>
							<li class="navbar-footer-item">
									<a href="<?php echo esc_url( $cmlt_er_menu_item['url'] ); ?>">
										<span>
											<?php echo esc_html( $cmlt_er_menu_item['title'] ); ?>
										</span>
									</a>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
	</section>
	<section class="flex justify-center py-1 bg-foreground/90 text-background">
		<p>Todos los derechos reservados.</p>
	</section>
</footer><!-- #colophon -->
