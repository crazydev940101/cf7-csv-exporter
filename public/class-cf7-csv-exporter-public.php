<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ieproductions.com
 * @since      1.0.0
 *
 * @package    Cf7_Csv_Exporter
 * @subpackage Cf7_Csv_Exporter/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Cf7_Csv_Exporter
 * @subpackage Cf7_Csv_Exporter/public
 * @author     Ariel Cruz <ariel@ieproductions.com>
 */
class Cf7_Csv_Exporter_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cf7-csv-exporter-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cf7-csv-exporter-public.js', array( 'jquery' ), $this->version, false );

	}

	function cf7_export_to_csv_on_submit($contact_form) {
		// Your existing code
		$option_name_contact_form_id = 'contact_form_id_for_csv_exporter';
		$target_form_id = get_option($option_name_contact_form_id);
	
		// Check if the form ID matches
		error_log('CF7 Export Triggered');
		$form_id = (string) $contact_form->id();
		error_log('Form ID: ' . $form_id);
	
		if ($form_id !== $target_form_id) {
			error_log('Form ID does not match. Expected: ' . $target_form_id . ', Found: ' . $form_id);
			return;
		}
	
		$submission = WPCF7_Submission::get_instance();
		if (!$submission) {
			error_log('No submission instance found');
			return;
		}
	
		$data = $submission->get_posted_data();
		if (empty($data)) {
			error_log('No data found');
			return;
		}
	
		error_log("Current Url: " . $_SERVER['HTTP_REFERER']);
	
		$upload_dir = wp_upload_dir();
		$csv_dir = $upload_dir['basedir'] . '/cf7-submissions/';
		

		if (isset($_SERVER['HTTP_REFERER'])) {
			$referer = $_SERVER['HTTP_REFERER'];
		
			if (strpos($referer, 'test-page') !== false) {
				$csv_file = $csv_dir . 'test-submissions.csv';
			} else if (strpos($referer, 'rpm-builder') !== false) {
				$csv_file = $csv_dir . 'rpm-submissions.csv';
			} else if (strpos($referer, 'tw-builder') !== false) {
				$csv_file = $csv_dir . 'tw-submissions.csv';
			} else if (strpos($referer, 'fr-builder') !== false) {
				$csv_file = $csv_dir . 'fr-submissions.csv';
			} else {
				// Handle case where referer doesn't match any expected patterns
				error_log('HTTP_REFERER does not match any expected patterns');
				return;
			}
		} else {
			error_log('HTTP_REFERER is not set');
			return;
		}
	
		error_log('CSV file path: ' . $csv_file);
	
		// Ensure the directory exists
		if (!file_exists($csv_dir)) {
			if (!wp_mkdir_p($csv_dir)) {
				error_log('Failed to create directory: ' . $csv_dir);
				return;
			}
		}
	
		// Open the file in append mode
		$file = fopen($csv_file, 'a');
		if ($file === false) {
			error_log('Failed to open file for writing');
			return;
		}
	
		// Add current date to data
		$data['Date'] = date('Y-m-d H:i:s'); // Include timestamp
	
		// Write the header row only if the file is new
		if (filesize($csv_file) === 0) {
			fputcsv($file, array_keys($data));
		}
	
		// Write the data row
		fputcsv($file, $data);
	
		// Close the file
		fclose($file);
	
		error_log('CSV Exported to ' . $csv_file);
	}
	
	

}
