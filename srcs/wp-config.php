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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pfile_server' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'JwhqkEVIrD~JA3;%U7/p%4#Yo]i-u5QP27yTyF5L3Na1 -lJq|!XdciP][p6bclM' );
define( 'SECURE_AUTH_KEY',  '8((eTvUSc5Rbc1+D%:v;wFWldl@9>,7k=.aotW49V[E<8W/U7QMzg5izck6bpUi]' );
define( 'LOGGED_IN_KEY',    '3|}!LPExe>-,U{;iDZ|3Ek|DzD!c(.>^Oz*Xw}hMuJ@/t$$F&o-$Uqray+U<)-SI' );
define( 'NONCE_KEY',        'D1N-*=<sf1cQhxa7@HEM-~:ZWyw8QAIB[m8+9haPoe<|U.-{Z6nW:O-_690g1z(#' );
define( 'AUTH_SALT',        '+T-ncJB^9pE{*)}qv3H{.9GV+fMJRrtvkvA&}&u?5%/+R8LC?B6BO`+z-c<6t,X+' );
define( 'SECURE_AUTH_SALT', 'OU|G-6Ph.-,&%glNr!@vDUT,Z+UJo_K[+iDv8+o|]ZvMRMbh)pedD8ZT|2$z3_Nd' );
define( 'LOGGED_IN_SALT',   '_^]k46-;7dtarYURwMK(I|&;)HEO^v.%RIMtt>4yaCN.0(X.V/)O[SUP~8SW->Lt' );
define( 'NONCE_SALT',       'I6b-3h]`1H%RWqv0%I7fIQ$*IIv*0~o,`t<an9wvI8]dK[^?uFLz+Ca 1etIPfb<' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
