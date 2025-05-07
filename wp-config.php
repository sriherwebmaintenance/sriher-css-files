<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

define( 'SBI_ENCRYPTION_KEY', 'W&6fSV$!(OzAw2JHxs*6(J9bLlqmummf5KW1!)*OxpF)n95$rjU$qqZ!F!JHjz42' );

define( 'SBI_ENCRYPTION_SALT', 'MxZhMxEO!3UI#Y7Bq8H%cIlX$i5FU1cNcMFdXn9U#AVNTDH8Ys)$pVYXA4D%XuE!' );

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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u379467699_css' );

/** Database username */
define( 'DB_USER', 'u379467699_css' );

/** Database password */
define( 'DB_PASSWORD', '07n88xRLnZvSDkI' );

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
define( 'AUTH_KEY',         '$B|luS.LBuP#Dh/IyM{l27-q!zO1k.(!513BxVEx=%]3wDbC9~53]Aof~$pm87sU' );
define( 'SECURE_AUTH_KEY',  '-ZS%t8-b`<,G7e$s4gs5XI~D*ep7/OY]KkJDcL}275j]{b;.:x`R+=N}I_zDdHXP' );
define( 'LOGGED_IN_KEY',    '/X/L//(^@&3)l3A+8{kYb ]CC,ygbi~7,A1J_BB@3+8WpNE2By7c9.l639*,z:>F' );
define( 'NONCE_KEY',        'It/gECgIp>,rcjy/kI))l%1Od!c;cQsrHQ~x.t86+/C5kU=<wkbeO%P_a)|>y[<l' );
define( 'AUTH_SALT',        '_Z0mxnN@+sy7~.{v5YaSQDa@;-pr>6|C?e5%@6VLH ddH`2>sxu?h,EsvUteVh_U' );
define( 'SECURE_AUTH_SALT', 'RbTpSG4*yTh(_4$?gj|OUz^f/VS-oo99-N(v2l/1C-i3:5=3Z)3He Na!)*KaeJo' );
define( 'LOGGED_IN_SALT',   '7;8W[t{/fI]8W$:]HP(V^YL((C_nyt;i@wxICjut9UGJnu&$EG9GqsZ$S*.hkBp.' );
define( 'NONCE_SALT',       'lLdlMJG9@VAt!0EgpPB8v:q#6>A6~?b?`?@8I(+T?N|RHH8ofgnbL4sg[gTdt90 ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'css_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
