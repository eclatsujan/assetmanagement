<?php

/**
 * Fired during plugin activation
 *
 * @link       http://linkode.com.au
 * @since      1.0.0
 *
 * @package    Decode_Asset_Management
 * @subpackage Decode_Asset_Management/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Decode_Asset_Management
 * @subpackage Decode_Asset_Management/includes
 * @author     Sujan Prajapati Maharjan <sujan@thewebsitemarketinggroup.com.au>
 */
class Decode_Asset_Management_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		$table_name=$wpdb->prefix."decode_items";
		$category_table_name=$wpdb->prefix."decode_categories";
		$category_pivot_table=$wpdb->prefix."decode_item_category";
		$item_table_field=$wpdb->prefix."decode_item_field";
		$item_table_meta=$wpdb->prefix."decode_item_meta";
		$item_request_table=$wpdb->prefix."decode_item_request";

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  name tinytext NOT NULL,
		  description text,
			type varchar(50),
			status varchar(50),
			total varchar(50),
			created_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			updated_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";

		self::runSql($sql);

		$sql = "CREATE TABLE $category_table_name (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  name tinytext NOT NULL,
		  description text,
			image text,
			icon varchar(255),
			created_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			updated_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";

		self::runSql($sql);

		$sql = "CREATE TABLE $category_pivot_table (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  item_id mediumint(9) NOT NULL,
		  category_id mediumint(9) NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		self::runSql($sql);

		$sql = "CREATE TABLE $item_table_field (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  name tinytext NOT NULL,
		  description text NOT NULL,
			image text NOT NULL,
			icon varchar(255) NOT NULL,
			created_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			updated_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";

		self::runSql($sql);

		$sql = "CREATE TABLE $item_table_meta (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  item_id mediumint(9) NOT NULL,
		  field_id mediumint(9) NOT NULL,
			description text NOT NULL,
			created_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			updated_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		  PRIMARY KEY  (id)
		) $charset_collate;";

		$sql = "CREATE TABLE $item_request_table (
		  id mediumint(9) NOT NULL AUTO_INCREMENT,
		  item_id mediumint(9) NOT NULL,
		  user_id mediumint(9) NOT NULL,
			description text NOT NULL,
			given_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			return_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		self::runSql($sql);
	}

	public static function runSql($sql){
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}



}
