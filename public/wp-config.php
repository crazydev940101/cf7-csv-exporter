<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache








/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'i2602329_wp1');

/** MySQL database username */
define('DB_USER', 'i2602329_wp1');

/** MySQL database password */
define('DB_PASSWORD', 'Z@((KnYtx]rTR]1pRJ&83*@5');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'QpadPT9UAk5NuLD2aK2WCplOdTOvMkcTOmFckinnSgcfbqjQTammC2cSBU06LYSA');
define('SECURE_AUTH_KEY',  'CwvEP2BdaChFYBHWBZO4s8bS922XaN932RlRy2KMR7BYCI6Q2YvaQ9bWkitOxgme');
define('LOGGED_IN_KEY',    'oyq2xaKh52fGd97wCL1JmlaRYcmYVyt4TDCtcSWleeMqHKOExv9ffLt3mi6VFZ65');
define('NONCE_KEY',        'FCdYSbzTeKYzeb9pcDHJeFhXjIB2XyGJ8ZiNS8ALg2ma5ShPzrmXJ00BBMidsZhH');
define('AUTH_SALT',        'B2ayqQATgIx8TIRXvqIEl14Ve0WRPZyhsOCfAO8jaaG8I4wNcp34GDb4jdS3D1tb');
define('SECURE_AUTH_SALT', 'jzneYFogDVc3mDBpFt7I4jH6yVJVHjwTw7ANnQMrEh4YoCq360G7TZwnmRm87fZz');
define('LOGGED_IN_SALT',   'IGwmgSqzuerGZcXA8QJyRiTvrgkeVM2WO242FgLkfPoSCmkTNgI6sYUuntLzNc2S');
define('NONCE_SALT',       'bp1IqfcfFvIEceu4HcfPRiwM2dSd6Ohdvc3VKq2wLqr5JNlc0T4pWRMu1gUzw3sF');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
//define('WP_DEBUG', false);
define('WP_MEMORY_LIMIT', '2048M');
set_time_limit(300);

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);

///////// WP_DEBUG_FROM_DASHBOARD_PLUGIN___START (If you need to remove this, at first deactivate plugin, and then fully remove this block, not partially!)
if(file_exists($a=__DIR__."/wp-content/plugins/enable-wp-debug-from-admin-dashboard/_wp_config_addon.php") && include_once($a)){  
	define("WP_DEBUG", ewdfad_WP_DEBUG);
	define("WP_DEBUG_DISPLAY", ewdfad_WP_DEBUG_DISPLAY);
	define("WP_DEBUG_LOG", ewdfad_WP_DEBUG_LOG);
}
///////// WP_DEBUG_FROM_DASHBOARD_PLUGIN___END


define( 'DUPLICATOR_AUTH_KEY', '@)=2tz`a!@n>E]%`WBp1IC;V]XT|53X}evon(,.Jo_*Ptmux}VEU=6zOVT=>;{ ;' );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
