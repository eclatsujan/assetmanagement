<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://linkode.com.au
 * @since      1.0.0
 *
 * @package    Decode_Asset_Management
 * @subpackage Decode_Asset_Management/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Decode_Asset_Management
 * @subpackage Decode_Asset_Management/includes
 * @author     Sujan Prajapati Maharjan <sujan@thewebsitemarketinggroup.com.au>
 */
class Decode_Asset_Management_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'decode-asset-management',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
