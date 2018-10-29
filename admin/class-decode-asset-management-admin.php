<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://linkode.com.au
 * @since      1.0.0
 *
 * @package    Decode_Asset_Management
 * @subpackage Decode_Asset_Management/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Decode_Asset_Management
 * @subpackage Decode_Asset_Management/admin
 * @author     Sujan Prajapati Maharjan <sujan@thewebsitemarketinggroup.com.au>
 */
class Decode_Asset_Management_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	private $dashboard;
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		// $this->enqueue_scripts()
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->dashboard= new Decode_Asset_Menu();
		$this->displayDashboardMenu();
		add_action("admin_init",array($this,"displaySubMenu"));
		// $this->displaySubMenu();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Decode_Asset_Management_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Decode_Asset_Management_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/decode-asset-management-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'am_admin_bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap-admin.min.css', array(), $this->version, 'all' );
		// wp_enqueue_style( 'am_admin_bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Decode_Asset_Management_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Decode_Asset_Management_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		 // wp_enqueue_script('am_admin_bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',array('jquery'));
		 wp_enqueue_script('am_admin_bootstrap',plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false);
		 wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/decode-asset-management-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function displayDashboardMenu(){
		$this->dashboard->setPageTitle("Decode Asset");
		$this->dashboard->setMenuTitle("Decode Asset");
		$this->dashboard->setCapability("manage_options");
		$this->dashboard->setSlug("decode-asset");
		$this->dashboard->addMenuPage();
		add_action("menu_page_decode-asset",array($this,"displayDashboardTemplate"));
	}

	public function displaySubMenu(){
		add_submenu_page("decode-asset","Decode Allotable","Allotable","manage_options","decode-asset-allotable",array($this,"displayAllotableMenu"));
	}

	public function displayDashboardTemplate(){
		$myListTable = new TWMGTable\Decode_List_Table();
		$data=array("myListTable"=>$myListTable,"form"=>$this->displayForm());
		return view("views/admin/dashboard",$data);
	}

	public function displayAllotableMenu(){

	}

	public function displayForm(){
		$form_fields=[
			[
				"type"=>"TWMG_Textbox",
				"attributes"=>["name"=>"asset_name","class"=>"form-control","placeholder"=>"Asset Name"]
			],
			[
				"type"=>"TWMG_Textbox",
				"attributes"=>["name"=>"category_id","class"=>"form-control","placeholder"=>"Category Id"];
			],
			[
				"type"=>"TWMG_Textbox",
				"attributes"=>["name"=>"category_id","class"=>"form-control","placeholder"=>"Category Id"];
			],
			[
				"type"=>"TWMG_Textbox",
				"attributes"=>["name"=>"category_id","class"=>"form-control","placeholder"=>"Category Id"];
			]
		];
		return (new TWMGForm\TWMG_Form($form_fields))->display();
	}

}
