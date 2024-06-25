<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package El_Resaltador
 */

?>

<header id="masthead" class="w-full max-w-screen-xl mx-auto px-4 py-2 flex justify-between bg-background z-10 sticky <?php echo is_user_logged_in() ? 'top-8' : 'top-0'; ?>">

	<div>
		<a href="/">
			<img src="<?php echo get_template_directory_uri() . '/assets/isologo.svg' ?>" alt="">
		</a>
	</div>

	<nav id="site-navigation" class="flex gap-4" aria-label="<?php esc_attr_e( 'Main Navigation', 'el-resaltador' ); ?>">
		<?php
		// wp_nav_menu(
		// 	array(
		// 		'theme_location' => 'menu-1',
		// 		'menu_id'        => 'primary-menu',
		// 		'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
		// 	)
		// );
		?>
		<button class="btn bg-gray-200 flex gap-2 items-center">
			<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M16.6 18L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13C4.68333 13 3.146 12.3707 1.888 11.112C0.63 9.85333 0.000667196 8.316 5.29101e-07 6.5C-0.000666138 4.684 0.628667 3.14667 1.888 1.888C3.14733 0.629333 4.68467 0 6.5 0C8.31533 0 9.853 0.629333 11.113 1.888C12.373 3.14667 13.002 4.684 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L18 16.6L16.6 18ZM6.5 11C7.75 11 8.81267 10.5627 9.688 9.688C10.5633 8.81333 11.0007 7.75067 11 6.5C10.9993 5.24933 10.562 4.187 9.688 3.313C8.814 2.439 7.75133 2.00133 6.5 2C5.24867 1.99867 4.18633 2.43633 3.313 3.313C2.43967 4.18967 2.002 5.252 2 6.5C1.998 7.748 2.43567 8.81067 3.313 9.688C4.19033 10.5653 5.25267 11.0027 6.5 11Z" fill="#1C1C1C"/>
			</svg>
			Buscar
		</button>
		<button class="btn bg-primary">Suscribite</button>
	</nav><!-- #site-navigation -->

</header><!-- #masthead -->
