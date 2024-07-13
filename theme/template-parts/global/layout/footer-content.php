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
	$social_media = [
		'facebook' => [
			'link' => [
				'title' => 'Seguínos en Facebook',
				'url' => 'https://www.facebook.com/elresaltador/'
			],
			'icon' => [
				'type' => 'brands',
				'name' => 'square-facebook',
				'id' => 'cmlt_er_fa_brands_square-facebook',
			]
		],
		'instagram'	=> [
			'link' => [
				'title' => 'Seguínos en Instagram',
				'url' => 'https://www.instagram.com/el_resaltador/'
			],
			'icon' => [
				'type' => 'brands',
				'name' => 'square-instagram',
				'id' => 'cmlt_er_fa_brands_square-instagram',
			]
		],
		'x' => [
			'link' => [
				'title' => 'Seguínos en Twitter',
				'url' => 'https://www.x.com/el_resaltadorok/'
			],
			'icon' => [
				'type' => 'brands',
				'name' => 'square-x-twitter',
				'id' => 'cmlt_er_fa_brands_square-x-twitter',
			]
		],
		'youtube' => [
			'link' => [
				'title' => 'Seguínos en YouTube',
				'url' => 'https://www.youtube.com/channel/UCrBeBcO7r1TQDWAP88wObcg'
			],
			'icon' => [
				'type' => 'brands',
				'name' => 'square-youtube',
				'id' => 'cmlt_er_fa_brands_square-youtube',
			]
		]
	];

	$menu_location = 'menu-2';
	$locations = get_nav_menu_locations();
	$check = $locations && isset( $locations[ $menu_location ] );
	$menu = $check ? cmlt_er_get_menu_array($menu_location) : [];
?>

<footer id="colophon">
	<section class="flex flex-col md:flex-row gap-8 justify-between w-full max-w-screen-2xl mx-auto bg-foreground text-background py-16 px-4 lg:px-8">
		<div class="flex flex-col gap-4">
			<a href="/">
				<img src="<?php echo get_template_directory_uri() . '/assets/logo_blanco.svg' ?>" alt="Logo de El Resaltador">
			</a>
			<p>Cooperativa de Trabajo El Resaltador Ltda.</p>
			<div class="flex gap-4">
				<?php
					foreach ( $social_media as $network ):

						$network_url = $network['link']['url'];
						$network_url_title = $network['link']['title'];
						
						$network_icon_type = $network['icon']['type'];
						$network_icon_name = $network['icon']['name'];
						$network_icon_id = $network['icon']['id'];

						get_template_part(
							'template-parts/global/components/component-button',
							'link',
							[
								'type' => 'icon',
								'link' => [
									'url' 		=> $network_url,
									'title' 	=> $network_url_title,
									'target' 	=> '_blank',
								],
								'icon' => [
									'display' 	=> true,
									'type'		=> $network_icon_type,
									'name' 		=> $network_icon_name,
									'id' 		=> $network_icon_id,
									'size'		=> 'xl',
									'classes'	=> 'fill-background',
								],
								'text' => [
									'display' 	=> false,
								],
							]
						);
					endforeach;
				?>
			</div>
		</div>
		<div class="flex items-center" id="footer-menu-wrapper">
				<!-- For mobile, list style -->
				<ul class="w-full flex flex-col sm:flex-row gap-4">
					<?php foreach ( $menu as $item ): ?>
						<?php if ( !empty( $item[ 'children' ] ) ): ?>
							<li class="navbar-footer-item navbar-footer-item--has-children">
								<span>
									<?php echo esc_html( $item[ 'title' ] ); ?>
								</span>
								<ul class="navbar-footer-item__sub-item">
									<?php foreach ( $item[ 'children' ] as $child ): ?>
										<li>
											<a href="<?php echo esc_url( $child[ 'url' ] ); ?>">
												<span>
													<?php echo esc_html( $child[ 'title' ] ); ?>
												</span>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php else: ?>
							<li class="navbar-footer-item">
									<a href="<?php echo esc_url( $item[ 'url' ] ); ?>">
										<span>
											<?php echo esc_html( $item[ 'title' ] ); ?>
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
