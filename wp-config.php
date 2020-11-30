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
define( 'DB_NAME', 'funnytrapnew' );
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
/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
define('AUTH_KEY',         '%@5B)5!f8}yRx|Qkz$XxpL70bP*gQki|Owc/->aCO$(F}L%Q!I!y:]qee|0c|j_W');
define('SECURE_AUTH_KEY',  'nv6D7h/$c>->>+5^wP/h5s9(4oHE`|=aVX)g4>FNCPsH-3iNN`SQTg9V~>e&D+-U');
define('LOGGED_IN_KEY',    'huraHW,ar#41rXZh#-gfxWSAT*A2]/JX%_*[8]Qx+1-#%++5oQU`[LiWdchf#@K9');
define('NONCE_KEY',        '~|;w_QTfCPLBo441ovu_~+[t?w/)|mF,+ZSQzB]Hu33}et`ztl8J.o;xY_@4N@lq');
define('AUTH_SALT',        '_PB;w.#:`rzC{:Fi:`+_-M0V&L.It|I3?}}Ouu`!Y&P=6hBkKrQ:?y,v/ask07FL');
define('SECURE_AUTH_SALT', '-;[T8%~)n4[kZm}5GrbcC-&WPmfx5a1sK?_KmPqgF=n%Pqsii3k+mt}3E%JCWd<[');
define('LOGGED_IN_SALT',   '7YIRfaMi[vk#+MNE0AQG:G:+;pNRawL`dr[anhW{?va7(-]5|( z4U-=9(%{a8L@');
define('NONCE_SALT',       '>[oIh&^QR:H+kf>BfMLB~es_m+p7C^CUUWV%|MbbP[8!l1@k7;S{l$*#E!D$juQR');
/**#@-*/
/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix = 'ftdb_';
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
# BEGIN WP Hide & Security Enhancer
define('WPH_WPCONFIG_LOADER',          TRUE);
include_once( ( defined('WP_PLUGIN_DIR')    ?     WP_PLUGIN_DIR   .   '/wp-hide-security-enhancer-pro/'    :      ( defined( 'WP_CONTENT_DIR') ? WP_CONTENT_DIR  :   dirname(__FILE__) . '/' . 'wp-content' )  . '/plugins/wp-hide-security-enhancer-pro' ) . '/include/wph.class.php');
if (class_exists('WPH')) { global $wph; $wph    =   new WPH(); ob_start( array($wph, 'ob_start_callback')); }
# END WP Hide & Security Enhancer
if ( ! defined( 'ABSPATH' ) ) {
define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
