<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ieproductions.com
 * @since             1.0.0
 * @package           Cf7_Csv_Exporter
 *
 * @wordpress-plugin
 * Plugin Name:       CF7 CSV Exporter
 * Plugin URI:        https://trailswesttrailers.com/
 * Description:       Here is the custom plugin to export contact form 7 submissions to a CSV file on form submission.
 * Version:           1.0.0
 * Author:            Ariel Cruz
 * Author URI:        https://ieproductions.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cf7-csv-exporter
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CF7_CSV_EXPORTER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cf7-csv-exporter-activator.php
 */
function activate_cf7_csv_exporter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cf7-csv-exporter-activator.php';
	Cf7_Csv_Exporter_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cf7-csv-exporter-deactivator.php
 */
function deactivate_cf7_csv_exporter() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cf7-csv-exporter-deactivator.php';
	Cf7_Csv_Exporter_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cf7_csv_exporter' );
register_deactivation_hook( __FILE__, 'deactivate_cf7_csv_exporter' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cf7-csv-exporter.php';

// Add this at the top of your PHP file to include Composer's autoloader
require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cf7_csv_exporter() {

	$plugin = new Cf7_Csv_Exporter();
	$plugin->run();

}
run_cf7_csv_exporter();
