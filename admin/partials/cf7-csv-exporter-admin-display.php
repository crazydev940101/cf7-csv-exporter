<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://ieproductions.com
 * @since      1.0.0
 *
 * @package    Cf7_Csv_Exporter
 * @subpackage Cf7_Csv_Exporter/admin/partials
 */

 
function cf7_csv_exporter_admin_register() {   
    // Add action for handling Location ID
    add_action( "admin_init", 'save_field_callback' );     
    add_settings_section('custom_admin_settings_section', '','section_callback', 'cf7_csv_exporter_admin_menu');
    add_settings_field('custom_input_field', 'Contact Form ID for CSV Exporter', 'input_field_callback', 'cf7_csv_exporter_admin_menu', 'custom_admin_settings_section');
}

function section_callback() {

    /**
    * Show section part
    */

    echo '<h2>Input the contact form ID for CSV exporter</h2>';
}

function input_field_callback() {

    /**
    * Show contact form id
    */

    $option_name_contact_form_id = 'contact_form_id_for_csv_exporter';

    $value_contact_form_id = get_option($option_name_contact_form_id);

    echo '<label>Contact Form ID: </label>';
    echo '<input type="text" id="contact_form_id_for_csv_exporter" name="' . $option_name_contact_form_id . '" value="' . esc_attr($value_contact_form_id) . '" />';
}

function save_field_callback() {

    /**
    * Save the contact form id
    */

    $option_name_contact_form_id = 'contact_form_id_for_csv_exporter';

    if (isset($_POST[$option_name_contact_form_id])) {
        update_option($option_name_contact_form_id, sanitize_text_field($_POST[$option_name_contact_form_id]));
    }

}

function cf7_csv_exporter_admin_page() {

    /**
    * Register it into the admin page.
    */

    ?>

        <form method="post" action="options.php">
            <?php                
            cf7_csv_exporter_admin_register();
            settings_fields('cf7_csv_exporter_admin_menu');
            do_settings_sections('cf7_csv_exporter_admin_menu');
            submit_button('Save Settings');
            ?>
        </form>
    <?php
}

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
