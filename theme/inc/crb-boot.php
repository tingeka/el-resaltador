<?php

add_action( 'after_setup_theme', 'cmlt_er_crb_load' );
function cmlt_er_crb_load() {
    require_once( get_theme_root() . '/el-resaltador/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
