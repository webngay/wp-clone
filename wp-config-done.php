<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - Information for AppFog ** //
/** The name of the database for WordPress */

$services = getenv("VCAP_SERVICES");
$services_json = json_decode($services,true);
$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
define('DB_NAME', $mysql_config["name"]);
define('DB_USER', $mysql_config["user"]);
define('DB_PASSWORD', $mysql_config["password"]);
define('DB_HOST', $mysql_config["hostname"]);
define('DB_PORT', $mysql_config["port"]);

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
define('AUTH_KEY',         'H%: w1&ja#C4wMu3g;{/-co{^#SF<Z|`oZY7(I}>-vZ;+f>EX7mI$?o[hYbP*s f');
define('SECURE_AUTH_KEY',  'APa02:EXKGfxM^W.Dtmz*3|Hm8?=2|E#`zr$GZv@KRq]wAGqGE<Q3gj$U#$(eTi<');
define('LOGGED_IN_KEY',    'vt_]ae?)WU}b>D~Ol_W0Al^uY]CF@XgG-|ZPB}&n_TMe-POjQ!F;-MLEYH0<X~}V');
define('NONCE_KEY',        'SN>1Z*lG#]7Ch7-xYsn-IQG(+_pAUuy{9O %Cqk<o^av.]xav4_|9`UmNMJn*h_Z');
define('AUTH_SALT',        'nZg9qm~{w`fqEZhj;4y$Z7o^ow+VP8Qs8z>8g&{rhlPkmaNplqEg4Ibx%nJ3T0]c');
define('SECURE_AUTH_SALT', 'F{A_8tHchGTeN~ea_ijcj;<d#`!1,cNC[>]*3=qVw*q]9K(a$_@qG_(LU8qc]Et3');
define('LOGGED_IN_SALT',   'q*YBdD5^LvTu~#^pL? !^%;Q(FF>S$bHqmyUHT;(!</hc^r,jfj/?lP+->@coOMa');
define('NONCE_SALT',       '7HL]`yS^(}&oX0m, [[!`Q-^g<?4/o:O#C{D!rY}[M_1 (-6v&3K>R70.N+~Vwzh');

define('WPRO_ON', true); // Enables the plugin and use configuration from contants.
define('WPRO_SERVICE', 'http');
define('WPRO_FOLDER', '');
define('WPRO_HTTP_URL', getenv('WPRO_HTTP_URL'));
define('WP_CONTENT_URL', getenv('WP_CONTENT_URL'));

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
