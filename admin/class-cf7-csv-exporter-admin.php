<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ieproductions.com
 * @since      1.0.0
 *
 * @package    Cf7_Csv_Exporter
 * @subpackage Cf7_Csv_Exporter/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cf7_Csv_Exporter
 * @subpackage Cf7_Csv_Exporter/admin
 * @author     Ariel Cruz <ariel@ieproductions.com>
 */
class Cf7_Csv_Exporter_Admin {

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

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

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
		 * defined in Cf7_Csv_Exporter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_Csv_Exporter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cf7-csv-exporter-admin.css', array(), $this->version, 'all' );

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
		 * defined in Cf7_Csv_Exporter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_Csv_Exporter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cf7-csv-exporter-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_cf7_csv_exporter_admin_menu() {

		/**
		* Add hook for admin menu
		*/

		register_setting('cf7_csv_exporter_admin_menu', 'contact_form_id_for_csv_exporter');

		register_setting('cf7_csv_exporter_admin_menu', 'sftp_host_for_csv_exporter');

		register_setting('cf7_csv_exporter_admin_menu', 'sftp_port_for_csv_exporter');

		register_setting('cf7_csv_exporter_admin_menu', 'sftp_user_for_csv_exporter');

		register_setting('cf7_csv_exporter_admin_menu', 'sftp_pass_for_csv_exporter');

        add_menu_page(
            __('CF7 CSV Exporter'),
            __('CF7 CSV Exporter'),
            'manage_options',
            $this->plugin_name,
            array($this, 'display_cf7_csv_exporter_admin_menu'),
        );
    }

	public function display_cf7_csv_exporter_admin_menu() {

		/**
		* Get admin page
		*/

		include_once( 'partials/cf7-csv-exporter-admin-display.php' );

		cf7_csv_exporter_admin_page();

    }

}
