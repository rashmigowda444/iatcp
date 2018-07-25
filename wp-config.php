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
define('DB_NAME', 'iatcp');

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
define('AUTH_KEY',         'L=q<{;m@L.~y?CMTLW|jh1m/[}(!>BLAFe7LR`[7.YSjhx}^B<ASlrD`ozqIPbo%');
define('SECURE_AUTH_KEY',  'v8{AI::5`4LDtdVSvx(KB75Ea7|8N8(iFY)KRBRRi)$q=,.R:Og49b>mMfQ:iB+q');
define('LOGGED_IN_KEY',    '+2R.tMXxG.O o4az73Y#mGIMgpYQ-gf|#1?==L#1:ZH)L#Y h@q,o^z0#Ug17fp)');
define('NONCE_KEY',        '(1JWt$>JoDHsOq(L NY,G9I*uiu|]6|[O,COeA+9y*Cy/~-0XO6%boXQU+$=1>2n');
define('AUTH_SALT',        ',Ch=%ggyf&lZQenW`qfA8v:N$iE9f{?1b0?o3dqpN0#sMnz^Uv&O]cW;T~)dH!g$');
define('SECURE_AUTH_SALT', 'CoNyq1`^38pykw7U<2f.Mu/z?t~ ACwa{-?C!hBbg3#;qx!y`[Gf9!kS-TVF v0d');
define('LOGGED_IN_SALT',   'e~2;C|,ANRYUyp=%k?iBJ#)zi,8Gu{<0$k[LaONqY%fnT1NIl7-WTb(^^axNkO@X');
define('NONCE_SALT',       'w*][I`8}WoJOfLNli[,^vtXzw^=*K}Q` #mNjP;rdrJW%UId_L%onUnJ$amm<.52');

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
define('FS_METHOD','direct');
