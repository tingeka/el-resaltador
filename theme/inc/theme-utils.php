<?php
/**
 * 
 * Custom theme utils.
 *
 * @package El_Resaltador
 * 
 */

$theme_dir = get_template_directory();
$utils = glob($theme_dir . '/inc/theme-utils/*.php');
foreach ($utils as $util) {
    if (is_file($util)) {
        require $util;
    }
}