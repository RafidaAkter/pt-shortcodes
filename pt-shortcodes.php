<?php

/**
 * Plugin Name:       ProteusThemes Shortcodes
 * Plugin URI:        https://github.com/proteusthemes/pt-shortcodes
 * Description:       ProteusThemes shortcodes used in our themes.
 * Version:           1.0.0
 * Author:            ProteusThemes
 * Author URI:        https://www.proteusthemes.com/
 * Text Domain:       pt-shortcodes
 */

// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class PT_Shortcodes {

	function __construct() {
		// Initialize shortcodes
		add_shortcode( 'fa', array ( $this , 'fa_shortcode' ) );
		add_shortcode( 'button', array ( $this , 'button_shortcode' ) );
	}

	/**
	 * Shortcode for Font Awesome
	 * @param  array $atts
	 * @return string HTML
	 */
	function fa_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'icon'   => 'fa-home',
			'href'   => '',
			'color'  => '',
			'target' => '_self',
		), $atts ) );

		if ( empty( $href ) ) {
			return '<span class="icon-container"><span class="fa ' . esc_attr( strtolower( $icon ) ) . '" ' . ( ! empty( $color ) ? 'style="color:' . esc_attr( $color ) . ';"' : '' ) . '></span></span>';
		}
		else {
			return '<a class="icon-container" href="' . esc_url( $href ) . '" target="' . esc_attr( $target ) . '"><span class="fa ' . esc_attr( strtolower( $icon ) ) . '" ' . ( ! empty( $color ) ? 'style="color:' . esc_attr( $color ) . ';"' : '' ) . '></span></a>';
		}
	}


	/**
	 * Shortcode for Buttons
	 * @param  array $atts
	 * @return string HTML
	 */
	function button_shortcode( $atts, $content = '' ) {
		extract( shortcode_atts( array(
			'style'     => 'primary',
			'href'      => '#',
			'target'    => '_self',
			'corners'   => '',
			'fa'        => null,
			'fullwidth' => false,
		), $atts ) );

		return '<a class="btn  ' . ( 'rounded' == $corners  ? 'btn-rounded' : '' ) . '  btn-' . esc_attr( strtolower( $style ) ) . ( 'true' == $fullwidth  ? '  col-xs-12' : '' ) . '" href="' . esc_url( $href ) . '" target="' . esc_attr( $target ) . '">' . ( isset( $fa )  ? '<i class="fa ' . $fa . '"></i> ' : '') . $content . '</a>';
	}
}

$pt_shortcodes = new PT_Shortcodes();
