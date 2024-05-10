<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rok' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'WYjx56N7i7N1bfUT1ggxrNdhCqPvOEJSXAl5pkd8E7st8x4A7ZMCzu7s0SZ7R0Kn' );
define( 'SECURE_AUTH_KEY',  'H1xq6j1yUeXiJjxW0Lkx1yhuvTBAOHiooyGzotfFpds9IpxQH0tm9ggEtmFQlZUM' );
define( 'LOGGED_IN_KEY',    'KWTGUEPajf5SAmOEVUF2cdO2zcqln6weknmcg1Qs88sEJFSmJMfbIHzG0S7q3ccI' );
define( 'NONCE_KEY',        'Snh0WWaoRfnfJ3Me4hFCPu888VAQi6JguDDnkl1AP73TZeReAWXq3dXNzHnnMzEy' );
define( 'AUTH_SALT',        'Bz0XywwDqI9WwTbFKnbefmBtRfAkQVD4v9MmUxQ2ARvYaktnfg1GGCqDDKqkzHqj' );
define( 'SECURE_AUTH_SALT', 'aCkpaSFPITWEsEqZbqV1VS0xKTGW7LcescUKv3IRkQmdgBHVdkOAMdrHuColWchW' );
define( 'LOGGED_IN_SALT',   'hMi4yd0AVepuu8DUhp557fGauR3n647IrwvVPvSK8T60sSPv9QDymYbMvQSMYZHf' );
define( 'NONCE_SALT',       'WRpY9dO96oX4ox45vHbMUlPcdhsfeY2hQzLogSuNXnbn9VJfVD95mgifXRwsmN6R' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
