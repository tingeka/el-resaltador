<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<?php
$cmlt_er_menu_location = 'menu-1';
$cmlt_er_menu_items    = cmlt_er_get_menu_array( $cmlt_er_menu_location ) ? cmlt_er_get_menu_array( $cmlt_er_menu_location ) : array();
?>

<!-- Search Modal -->
<?php
	get_template_part(
		'template-parts/global/components/component',
		'search-modal',
		array()
	);
	?>
<header id="masthead" class="sticky z-30 mx-auto flex h-16 w-full max-w-screen-xl justify-between bg-background px-4 py-2 <?php echo is_user_logged_in() ? 'top-8' : 'top-0'; ?>">

	<div>
		<a href="/">
		<?php
		echo cmlt_er_content_tag(//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'img',
			'',
			array(
				'src' => get_template_directory_uri() . '/assets/isologo.svg',
				'alt' => 'Logo El Resaltador',
			)
		);
		?>
		</a>
	</div>

	<nav id="site-navigation" class="flex items-center gap-2 md:gap-4" aria-label="<?php esc_attr_e( 'Main Navigation', 'el-resaltador' ); ?>">
		<button data-collapse-toggle="navbar-wrapper" type="button" class="inline-flex size-10 items-center justify-center rounded-lg p-2 text-sm text-foreground hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden" aria-controls="navbar-dropdown" aria-expanded="false">
			<span class="sr-only">
				<?php echo esc_html__( 'Abrir menú principal', 'el-resaltador' ); ?>
			</span>
			<?php
				get_template_part(
					'template-parts/global/components/component',
					'icon',
					array(
						'type'    => 'solid',
						'name'    => 'bars',
						'id'      => 'cmlt_er_fa_solid_bars',
						'size'    => '',
						'classes' => '',
					),
				);
				?>
		</button>
		<div class="absolute left-0 top-16 hidden w-full bg-background md:relative md:inset-0 md:flex md:w-auto md:items-center" id="navbar-wrapper">
			<ul class="hidden gap-4 p-4 md:flex md:flex-row md:items-center md:p-0">
				<?php foreach ( $cmlt_er_menu_items as $cmlt_er_menu_item ) : ?>
					<?php if ( ! empty( $cmlt_er_menu_item['children'] ) ) : ?>
						<li class="navbar-dropdown-item navbar-dropdown-item--has-children relative">
							<button id="navbar-dropdown-btn-<?php echo esc_attr( $cmlt_er_menu_item['ID'] ); ?>" data-dropdown-toggle="navbar-dropdown-container-<?php echo esc_attr( $cmlt_er_menu_item['ID'] ); ?>" class="navbar-dropdown__btn">
								<span class="navbar-dropdown-item__title">
									<?php echo esc_html( $cmlt_er_menu_item['title'] ); ?>
								</span>
								<svg class="ml-2.5 size-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
								</svg>
							</button>
							<div id="navbar-dropdown-container-<?php echo esc_attr( $cmlt_er_menu_item['ID'] ); ?>" class="navbar-dropdown-container">
								<ul class="navbar-dropdown-item__sub-item" aria-labelledby="navbar-dropdown-btn-<?php echo esc_attr( $cmlt_er_menu_item['ID'] ); ?>">
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
							</div>
						</li>
					<?php else : ?>
						<li class="navbar-dropdown-item">
							<a href="<?php echo esc_url( $cmlt_er_menu_item['url'] ); ?>">
								<span>
									<?php echo esc_html( $cmlt_er_menu_item['title'] ); ?>
								</span>				
							</a>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<!-- For mobile, list style -->
			<ul class="flex flex-col gap-4 shadow-2xl md:hidden">
				<?php foreach ( $cmlt_er_menu_items as $cmlt_er_menu_item ) : ?>
					<?php if ( ! empty( $cmlt_er_menu_item['children'] ) ) : ?>
						<li class="navbar-list-item navbar-list-item--has-children">
							<span>
								<?php echo esc_html( $cmlt_er_menu_item['title'] ); ?>
							</span>
							<ul class="navbar-list-item__sub-item">
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
						<li class="navbar-list-item">
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
		<?php
			/**
			 * Link to Search Page
			 */
			get_template_part(
				'template-parts/global/components/component',
				'button',
				array(
					'type' => 'neutral',
					'icon' => array(
						'display' => true,
						'type'    => 'solid',
						'name'    => 'magnifying-glass',
						'id'      => 'cmlt_er_fa_solid_magnifying-glass',
						'size'    => '',
						'classes' => '',
					),
					'text' => array(
						'display' => true,
						'content' => 'Buscar',
						'classes' => 'hidden md:block',
					),
					'attr' => array(
						'data-a11y-dialog-show' => 'search-modal',
					),
				)
			);
			/**
			 * Link to Suscribirse Page
			 */
			get_template_part(
				'template-parts/global/components/component-button',
				'link',
				array(
					'type' => 'primary',
					'link' => array(
						'url'     => '/suscribite',
						'title'   => 'Suscribite',
						'classes' => '',
					),
					'icon' => array(
						'display' => false,
						'name'    => '',
						'classes' => '',
					),
					'text' => array(
						'display' => true,
						'content' => 'Suscribite',
						'classes' => '',
					),
				)
			);

			?>
	</nav><!-- #site-navigation -->

</header><!-- #masthead -->
