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
	require_once ___MCW__PLUGIN_DIR_PATH . 'widgets/malibu-carthago-dealers-map.php';
	require_once ___MCW__PLUGIN_DIR_PATH . 'widgets/malibu-carthago-dealers-search-results.php';

	$widgets_manager->register( new \Malibu_Carthago_Search_Widget() );
	$widgets_manager->register( new \Malibu_Carthago_Dealers_Map() );
	$widgets_manager->register( new \Malibu_Carthago_Dealers_Search_Results() );

}

add_action( 'elementor/widgets/register', '___mcw__register_custom_elementor_widgets' );


function ___mcw__register_widget_scripts(){

	wp_register_script(
		'---mcw--dealers-search-widget-scripts',
		___MCW__PLUGIN_DIR_URL . 'assets/build/search-widget.js',
		[],
		null,
		true
	);

	wp_register_script(
		'---mcw--dealers-map-widget-scripts',
		___MCW__PLUGIN_DIR_URL . 'assets/build/dealers-map-widget.js',
		[],
		null,
		true
	);

	wp_register_script(
		'---mcw--dealers-search-results-widget-scripts',
		___MCW__PLUGIN_DIR_URL . 'assets/build/dealers-search-results-widget.js',
		null,
		null,
		true
	);
	
	wp_register_style(
		'---mcw--search-widget-styles',
		___MCW__PLUGIN_DIR_URL . 'assets/build/search-widget.css',
		null,
		null,
		'all'
	);
	
	wp_register_style(
		'---mcw--dealers-map-widget-styles',
		___MCW__PLUGIN_DIR_URL . 'assets/build/dealers-map-widget.css',
		null,
		null,
		'all'
	);
	
	wp_register_style(
		'---mcw--dealers-search-results-widget-styles',
		___MCW__PLUGIN_DIR_URL . 'assets/build/dealers-search-results-widget.css',
		null,
		null,
		'all'
	);

}

add_action('wp_enqueue_scripts', '___mcw__register_widget_scripts');

