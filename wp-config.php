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
define( 'DB_NAME', 'muzic' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '240508' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'Uhu|:R`,?9:ZJ4[srOFB]ES6;:=3UX^x2d2=$P@9+eZrhoX=+s5Vky}=g$2wBoD`' );
define( 'SECURE_AUTH_KEY',  ',n=a!Bs=EW<sFLUy^731EAHhbv*(>n|&4XF7-JdROw>$gQ7+8<,pB:_?sEEl[w U' );
define( 'LOGGED_IN_KEY',    '|~tKCSfeTw$@nrCWAAh~2DWzHk^U_vrj#(G{$e@N/PH?:m}Z4SDcS3&ZW) %*SFr' );
define( 'NONCE_KEY',        'QZoKMLH#420zW2LOHf%H<vST$@[!oAR/+lu sx|4tk7.zp8z;KZ/<dv%Uu~-Cm=`' );
define( 'AUTH_SALT',        'kXoIL5EKl87M?m$4^W1qsFLXt{ku%vql[Pym>d!|. nVrk%*LiC%@ePUYDnU(<YB' );
define( 'SECURE_AUTH_SALT', 'KMc>`/upT$J1$%UfQmV&x1Qfvc)LA>]zFG<jUTWA~R;pfc@_vMN[LhSg;8-|2;r.' );
define( 'LOGGED_IN_SALT',   '%,_5Wi0Rmp|6{;4k+BvX_.0(&MMu~8NA*[e!iWk2o!:yh#($wN(58v2rugz/iso5' );
define( 'NONCE_SALT',       'G#m#Gni[kZJ}^Wd*0ur?R~)+:0*O-9mZtE/8EJBnO%FCvyRZEGE+)5Lqg6r[.J,D' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mz_';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
