<?php
/*
Plugin Name: Ultimate WP Filter
Plugin URI: http://faleddo.x10.bz/free-software
Description: A lighweight filtering plugin. Just activate and it will censor explicit words automatically by replacing them with asterik(*) characters.
Version: 1.1.0
Author: Laurensius Faleddo
Author URI: http://faleddo.x10.bz
Text Domain: ultimate-wp-filter
Licence: GPL2
*/	

	include(dirname(__FILE__)."/form.php");
	include(dirname(__FILE__)."/filter.php");
	include(dirname(__FILE__)."/functions.php");
	
	//add_filter( 'plugin_row_meta', 'register_plugin_links', 10, 2 );
	add_action( 'plugins_loaded', 'uwpf_clean' );
	add_action( 'admin_init', 'requires_wordpress_version' );
	register_activation_hook(__FILE__, 'uwpf_SetDefaults');
	register_uninstall_hook(__FILE__, 'uwpf_delete_plugin');
	add_action('admin_init', 'uwpf_init' );
	add_action('admin_menu', 'uwpf_add_page');

?>