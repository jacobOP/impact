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
//define('DB_NAME', 'impact');
define('DB_NAME', 'outerp5_impact');

/** MySQL database username */
//define('DB_USER', 'impact');
define('DB_USER', 'outerp5_impact');

/** MySQL database password */
define('DB_PASSWORD', 'tSXYR8r4VntWxUGZ');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'V!x!Y%zD<$tb8[?h2Fjaz+#_!;/S:jT!Xb`ilpgDK0RkUU)>Saeo]k9Osf_{W<jP');
define('SECURE_AUTH_KEY',  'Pwrve]=YX(iqn.^~=.fCTXGp|Wf[^GK5;Y{Sf8*BkNFyL:HU5&.=S+tB}]oA9T^^');
define('LOGGED_IN_KEY',    'mPbX;6uhz#q~/MmHX-CB5x;kcLy^tOwUjJl+^*ZS|V6l)fiL2;6<Z.xn?.687@W=');
define('NONCE_KEY',        ':_s#=BdQMmvW{iS)m3g!Ls^A7bIDR,c>ga#4z|VX( |YI+1Gs|IiV`5G0P%oZZN!');
define('AUTH_SALT',        'MD^?brvT&CdMm4!Z=l|QC _5ws-Zkz-tr<Sl%!S!XIljw58mXKzC]U*f1g@2,+<@');
define('SECURE_AUTH_SALT', 'C?Nf0,W..Vn9t{=t@X^4sMDV VzgjdXAZ4.&<pHPvR1`uYILxb9_b%8zo8`zLUjG');
define('LOGGED_IN_SALT',   '2x=i7Eu_()0]5{V(o=gPUsS/My+2fdh?)Go8iWYP{5s@+.pox,6xT={bHl&TaN(V');
define('NONCE_SALT',       'tfWeG(Z[a(`e)Pv$1?m}{=m*:;22DX~r@MP6uw[5B.=z0qo_Z$HO6q#pc.h;`ePo');

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
