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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nerdfiles_webjou');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'webjournaldev.com');

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
define('AUTH_KEY', 'KIS6WxSBBnRPkBiUTdBv3nKhfLbY3t9wD8MxAA7hDVwkfbIimCGs6e3pIXUjEPoz');
define('SECURE_AUTH_KEY', 'p6TflEXRAPlsaIqQhXm1nBqBZKILqXYXVxB7vgjzYUHS1INHGhnRvDQ7zw2nKEJ5');
define('LOGGED_IN_KEY', 'GlbSkpxn8f9wj8saAuRjsbzLaESJBXtxsYknq8JVz5zdKj9QfoiGPVKEZYzFyfZO');
define('NONCE_KEY', 'kFcxlyvS6VqqYiVg3pTbFQrX97Qiv0csCBay2fBt4wqjLXowayxg151Vpj7WuXUS');
define('AUTH_SALT', 'uTnRPCZ5fLUpgAws1P1dD7xCKaI704Nvg0heHDIXukF5K1J3L49YgYsKAjc8jZnc');
define('SECURE_AUTH_SALT', 'c0U5EhfUx0VtV3PWiG1wYpUXAYhxVOhHUznKvyh7G33Rlv5wX5h0r8ZYxgkVgBCZ');
define('LOGGED_IN_SALT', 'gXz5WjWppwHKIA1oMOmNoR9ftSiBrkpEymzWulGHpLhtWPdSvz3RiVuGMPKuRdEL');
define('NONCE_SALT', 'pFqu4AM1pkVIM4HbckB2rwKQs3oIjP78UBRPXmX40G3F2tMNIy3pAejasSC6Tt6L');

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
