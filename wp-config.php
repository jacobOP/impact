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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'impact');

/** MySQL database username */
define('DB_USER', 'impact');

/** MySQL database password */
define('DB_PASSWORD', '+Dx4(<zm9E');

/** MySQL hostname */
define('DB_HOST', 'impact-database.cc9mrfactrwl.us-east-1.rds.amazonaws.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '!bwM6K8q@_;44Cs5kIXV>b.<$Ur-^1,Ud&Be6{$#SIYicm2:-89<)Y3149~)ZZ4[');
define('SECURE_AUTH_KEY',  'LNk[0*s5],{N19O~_Cpiqj|?Vo5hFkv42,?nA0TxtEzg@z&I!X$p}!|DxVvG|qVB');
define('LOGGED_IN_KEY',    'UQ]&=6>$*&Ko1uT-D4d8)]$3O@mkrN{qJBoh9@he?gR4#-7Fe`iKL9zUt;2`nm|N');
define('NONCE_KEY',        'ElH9]4Vc((58Iz_(_T4Me7v)Ero;M+CqP*V_F7e{|UeEyFD|7!H))O7BO_57DW]!');
define('AUTH_SALT',        'mf|z`fXeD*H9`|Y)nk-Asq-v*Ya/R7yse1OEC0rlv>8y9$v{8C7],%LR:z7YX8xS');
define('SECURE_AUTH_SALT', 'Db)ACgwuuU4u}4GW0yB<9:r$N>=ifqG(qk(e8{#3vH*-U|e!Ze}Zg?#&z{YeKPRl');
define('LOGGED_IN_SALT',   'fFgV*l@E/ns1m3<G# _p:VDfee&b=47R.K}pNXM@Nt$,?}3JN<sJFz^P|.eb%Y[{');
define('NONCE_SALT',       '6dfe~!N)Jy7f3DF7(Z3i.$h>A0<4[ +l177~t g$PY7{3<kxVx<|y;pAC!|P&Z2K');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


