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

$menu_location = 'menu-1';
$locations = get_nav_menu_locations();
$check = $locations && isset( $locations[ $menu_location ] );
$menu = $check ? cmlt_er_get_menu_array($menu_location) : [];

?>

<header id="masthead" class="relative h-16 w-full max-w-screen-xl mx-auto px-4 py-2 flex justify-between bg-background z-10 sticky <?php echo is_user_logged_in() ? 'top-8' : 'top-0'; ?>">

	<div>
		<a href="/">
			<img src="<?php echo get_template_directory_uri() . '/assets/isologo.svg' ?>" alt="">
		</a>
	</div>

	<nav id="site-navigation" class="flex items-center gap-2 md:gap-4" aria-label="<?php esc_attr_e( 'Main Navigation', 'el-resaltador' ); ?>">
		<button data-collapse-toggle="navbar-wrapper" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-foreground rounded-lg md:hidden hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
			<span class="sr-only">
				<?php echo esc_html__( 'Abrir menú principal', 'el-resaltador' ); ?>
			</span>
			<?php
				get_template_part(
					'template-parts/global/icons/icon',
					'hamburger',
					[
						'classes' => 'fill-foreground'
					]
				) 
			?>
		</button>
		<div class="hidden w-full absolute top-16 left-0 bg-background md:relative md:inset-0 md:flex md:items-center md:w-auto" id="navbar-wrapper">
			<ul class="hidden gap-4 p-4 md:p-0 md:flex md:flex-row md:items-center">
				<?php foreach ( $menu as $item ): ?>
					<?php if ( !empty( $item[ 'children' ] ) ): ?>
						<li class="relative navbar-dropdown-item navbar-dropdown-item--has-children">
							<button id="navbar-dropdown-btn-<?php echo $item[ 'ID' ]; ?>" data-dropdown-toggle="navbar-dropdown-container-<?php echo $item[ 'ID' ]; ?>" class="navbar-dropdown__btn">
								<span class="navbar-dropdown-item__title">
									<?php echo esc_html( $item[ 'title' ] ); ?>
								</span>
								<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
									<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
								</svg>
							</button>
							<div id="navbar-dropdown-container-<?php echo $item[ 'ID' ]; ?>" class="navbar-dropdown-container">
								<ul class="navbar-dropdown-item__sub-item" aria-labelledby="navbar-dropdown-btn-<?php echo $item[ 'ID' ]; ?>">
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
							</div>
						</li>
					<?php else: ?>
						<li class="navbar-dropdown-item">
							<a href="<?php echo esc_url( $item[ 'url' ] ); ?>">
								<span>
									<?php echo esc_html( $item[ 'title' ] ); ?>
								</span>				
							</a>
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
			<!-- For mobile, list style -->
			<ul class="flex flex-col gap-4 md:hidden">
				<?php foreach ( $menu as $item ): ?>
					<?php if ( !empty( $item[ 'children' ] ) ): ?>
						<li class="navbar-list-item navbar-list-item--has-children">
							<span>
								<?php echo esc_html( $item[ 'title' ] ); ?>
							</span>
							<ul class="navbar-list-item__sub-item">
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
						<li class="navbar-list-item">
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
		<?php
			/**
			 * Link to Search Page 
			 */  
			get_template_part(
				'template-parts/global/components/component-button',
				'link',
				[
					'type' => 'neutral',
					'link' => [
						'url'    => get_search_link(),
						'title'  => 'Buscar',
						'classes' => '',
					],
					'icon' => [
						'display' 	=> true,
						'type' 		=> 'solid',
						'name' 		=> 'magnifying-glass',
						'id'     	=> 'cmlt_er_fa_solid_magnifying-glass',
						'size' 		=> '',
						'classes' 	=> '',
					],
					'text' => [
						'display' => true,
						'content' => 'Buscar',
						'classes' => 'hidden md:block',
					],
				]
			);
			/**
			 * Link to Suscribirse Page 
			 */  
			get_template_part(
				'template-parts/global/components/component-button',
				'link',
				[
					'type' => 'primary',
					'link' => [
						'url'    => '/suscribite',
						'title'  => 'Suscribite',
						'classes' => '',
					],
					'icon' => [
						'display' => false,
						'name'     => '',
						'classes' => '',
					],
					'text' => [
						'display' => true,
						'content' => 'Suscribite',
						'classes' => '',
					],
				]
			);

		?>
	</nav><!-- #site-navigation -->

</header><!-- #masthead -->
