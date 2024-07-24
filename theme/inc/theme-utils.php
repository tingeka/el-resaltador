<?php
/**
 *
 * Custom theme utils.
 *
 * @package El_Resaltador
 */

$cmlt_er_theme_dir = get_template_directory();
$cmlt_er_utils     = glob( $cmlt_er_theme_dir . '/inc/theme-utils/*.php' );
foreach ( $cmlt_er_utils as $cmlt_er_util ) {
	if ( is_file( $cmlt_er_util ) ) {
		require $cmlt_er_util;
	}
}
