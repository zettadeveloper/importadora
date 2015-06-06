<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'importad_severino');

/** MySQL database username */
define('DB_USER', 'importad_live');

/** MySQL database password */
define('DB_PASSWORD', '3E80Tz[irwnf');

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
define('AUTH_KEY',         '4W13#tBs^f/g+<P/[Eo|lAKz~yF@fB$W]ZUq2t$Bbyhz*-i!dx8IUgz4?~lJW3,D');
define('SECURE_AUTH_KEY',  '11z;8R|/9eU /G&rtY@le7YjE 0|_qAL9yLG-&jdO`E)+ xDXv3^hmb^Cv8dn46*');
define('LOGGED_IN_KEY',    '7Jjmj|A} #oq^nf`r&c{~5}p;RNMg-m<->@iB7Zm)>`i*Ph1H*p-Nkc_/<a. _9a');
define('NONCE_KEY',        'Zl>s+1x9]x>13sqK7dr|9ax8BIFdWvBJ:1Q<byvOL;N!R+-_:V3K+*-U9#-|iXe.');
define('AUTH_SALT',        'o:v^S+tNJFu|`|@*!{+{M4}N4!%cfV5Ye`uD$D;PlE[1*C 8j%@jlQRW%4i>`MHN');
define('SECURE_AUTH_SALT', '$pT2|jLeT=~Q65YqTHZI01;zK8q}1-2e)Yh[k?l{{q2 -SlM2Gv(Ya4(nMvnu;lA');
define('LOGGED_IN_SALT',   'p7SG=!J^sEHoc<]MQ%@B$hjPu*zYq.<5;oH]x_O<E88?&? 2<u#kXkL-#CT{QGIi');
define('NONCE_SALT',       ' q5d%p:|~|<;D9@c@L6L4&+$+;|-u&S*PRQB(1|ZM8vxa*RES%<53df~=7[YGe0c');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
