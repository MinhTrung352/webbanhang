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
define('DB_NAME', 'agil_webbanhang');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Q3-+n3<6O56SL^bVx8FQmBNS:fFj^:Uy4vE23/_MB2R&B!K1dmwjEg5t.Mq: ,!V');
define('SECURE_AUTH_KEY',  '3o)d]]x3#j{{52S!-kuq;ch m[fe9/{%lH[laHp0V@@&RLuvP7g/^y{ft/wpU!ru');
define('LOGGED_IN_KEY',    'IeMA(VwT0x2VMmb|=/E}~VdJ4GnF_BoguCl>sRsPr^2Bj#&Us-n35AUgQQ;5qc*>');
define('NONCE_KEY',        '6$vs($SIP=;Hw4xcz$)*}oZB Ac/kpUKX+$~kUa!%$W:u;;xQxoc}cOW!=GmqlI$');
define('AUTH_SALT',        'Z!igaW=U#2_R(_]p++Jp3A9c x<yVA]jb2f mv+Z#0#=8FnkE%f;OkE;/&WGKDSa');
define('SECURE_AUTH_SALT', '1B,zz%tgj[*6T,O,zg&$y@3bV*ARYRKgo|/%X$S;j=y)?dx{Z/?L0M^&ACqLW{JM');
define('LOGGED_IN_SALT',   '-[>er3FJ%Y.TB}B1NW,Ly0g|Bgd.Z0,{=cv@wbM5?!,)SOb5o+N+O<mq(@A3QXol');
define('NONCE_SALT',       'wm:RDHJtJLXcW9(U%t)0-K1IXW7*Xh%g&D$EuROvmTd$Xm[qk*q#nS6R_jFde3iW');

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
