<?php
/**
 * Plugin Name: modaresyar
 * Description: Auto embed any embbedable content from external URLs into Elementor.
 * Plugin URI:  https://naqhvi.ir/
 * Version:     4.3.2
 * Author:      Hosien naqvi, Reza Mousavi
 * Author URI:  https://naqhvi.ir/
 * Text Domain: modaresyar
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.21.0
 * Elementor Pro tested up to: 3.21.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
function register_videoplaylist_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/playlist-widget.php' );

	$widgets_manager->register( new \Elementor_playlist_Widget() );

}
add_action( 'elementor/widgets/register', 'register_videoplaylist_widget' );

function bplayer() {
    wp_register_style('modaresyar-style', plugins_url('inc/modaresyar.css', __FILE__), false, '1.0.0', 'all');
	wp_enqueue_style('modaresyar-style');
	wp_register_script('modaresyar-js', plugins_url('modaresyar/inc/modaresyar.js'), array(), '7.21.1', true);
    wp_enqueue_script('modaresyar-js');
    wp_register_style('zenplayer', plugins_url('modaresyar/inc/video-js.css'), false, '1.0.0', 'all');
    wp_enqueue_style('zenplayer');
    wp_register_script('zenplayer-js', plugins_url('modaresyar/inc/video.min.js'), array(), '8.16.1', true);
    wp_enqueue_script('zenplayer-js');

}
add_action('wp_enqueue_scripts', 'bplayer');

function Modaresyar_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'modaresyar-elements',
		[
			'title' => esc_html__( 'مدرس یار', 'modaresyar' ),
			'icon' => 'fa fa-circle-play',
		]
	);
			
}
add_action( 'elementor/elements/categories_registered', 'Modaresyar_widget_categories' );
