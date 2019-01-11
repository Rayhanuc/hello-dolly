<?php
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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'VIHuzzRIZSqMavgUSK78gSsdr1MX+s0FvBqVFiveREJyGddek2WEw1LGKlpUuKCQS/fYYmYkTxN4KazKd/DkNg==');
define('SECURE_AUTH_KEY',  '+SVRUnuOqSPt9OOWCFclR/bg0EV120qO6XV5SiP1TE5019XsnejRc2dEZtyA0vWFAzLQQD1ohkbqGatVsBPW5w==');
define('LOGGED_IN_KEY',    'nZrDOTZ0FbngL7wo+qtvXvMvX+5nwAVNBCv5Zz9SZDjIYZMnNMu8r/FcgFWmE5peEWOpQfcJ9PfUB0oH4xausQ==');
define('NONCE_KEY',        '02Sx58hLFxzxhC1Che0mNTB1HrlzWad6nvC9aq7zHO1/dXY3Vn9Z2mQfs50gCM8BqGaKWm1FuqT5kLM9RTPKnw==');
define('AUTH_SALT',        '05Uamm5e/k9rgKHlvkC1Hv9M2L+msLxhTZT8wA83y4y6dcA24jgHkT+KPfyI5DKJVsYQKBAE63WsOP6BtMYz8g==');
define('SECURE_AUTH_SALT', 'eMYXVqoEDrRpvu+yVl7lbZOU6WpBoz4MR53Ya2nnbkMG46ONj3cPbbS7thJr+Rs0eUsbIag/NXdxTfhEMNYdOQ==');
define('LOGGED_IN_SALT',   '4lMkNxpz41r+OGlCjzkIH7BNP/7zGdC+x+wbM99BMNMPtwfe8wdpIG5KmEL0p1mz1l7u6pSf143Ou7GncYFEPg==');
define('NONCE_SALT',       'cS7s6uIoCok+ZjrjBO651EfKD0XEYK7rMlwzMSclo+gS+OsJpYmht0sHk1WY0mbEJj1xK/XrOyNDp06NiSXNJg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
