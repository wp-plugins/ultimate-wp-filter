<?php
/*
Plugin Name: Ultimate WP Filter
Plugin URI: http://faleddo.x10.bz/free-software
Description: A lighweight filtering plugin that will censor explicit words automatically by replacing them with asterik(*) characters in many language and user-defined keywords.
Version: 1.4.0
Author: Laurensius Faleddo
Author URI: http://faleddo.x10.bz
Text Domain: ultimate-wp-filter
Licence: GPL2
*/	

	include(dirname(__FILE__)."/uwpf_form.php");
	include(dirname(__FILE__)."/uwpf_filter.php");
	include(dirname(__FILE__)."/uwpf_functions.php");
	
	//add_filter( 'plugin_row_meta', 'register_plugin_links', 10, 2 );
	add_action( 'plugins_loaded', 'uwpf_clean' );
	add_action( 'admin_init', 'requires_wordpress_version' );
	add_action('admin_init', 'uwpf_load_js');
	register_activation_hook(__FILE__, 'uwpf_SetDefaults');
	register_uninstall_hook(__FILE__, 'uwpf_delete_plugin');
	add_action('admin_init', 'uwpf_init' );
	add_action('admin_menu', 'uwpf_add_page');

?>