<?php 

/*
 * Plugin name: Malibu Carthago Elementor Custom Widgets
 * Author: The Wild Fields
 * Author URI:  https://thewildfields.com/
 * Version: 3.0
 * Description: Set of custom Elementor widgets for the malibu-carthago.com website.
 * Text Domain: malibu-carthago-widgets
 */

define( '___MCW__PLUGIN_DIR_PATH' , plugin_dir_path(__FILE__) );
define( '___MCW__PLUGIN_DIR_URL' , plugin_dir_url(__FILE__) );

function ___mcw__register_custom_elementor_widgets( $widgets_manager ) {

	require_once ___MCW__PLUGIN_DIR_PATH . 'widgets/malibu-carthago-search-widget.php';

	$widgets_manager->register( new \Malibu_Carthago_Search_Widget() );

}

add_action( 'elementor/widgets/register', '___mcw__register_custom_elementor_widgets' );


function ___mcw__register_widget_scripts(){

	wp_register_script(
		'---mcw--widget-scripts',
		___MCW__PLUGIN_DIR_URL . 'assets/build/widget-scripts.js',
		null,
		null,
		true
	);

	wp_register_script(
		'---mcw--google-api',
		___MCW__PLUGIN_DIR_URL . 'assets/build/google-api.js',
		null,
		null,
		true
	);
	
	wp_register_style(
		'---mcw--widget-styles',
		___MCW__PLUGIN_DIR_URL . 'assets/build/bundle.css',
		null,
		null,
		'all'
	);

}

add_action('wp_enqueue_scripts', '___mcw__register_widget_scripts');
