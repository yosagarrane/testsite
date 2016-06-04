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
define('DB_NAME', 'testsite');

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
define('AUTH_KEY',         'tEG9*fUS@/f9l<|IT8ZtLI_gY%zE:G0h6k_c/V`QAZM7&`~oVDm#)89^j,#il}WU');
define('SECURE_AUTH_KEY',  'G)`s-sMYtHMZdnA@B8c?G#1_D+z&?8XDtl9V(pB9[kQ5GOL!>ky%QR>-&o|m]aMo');
define('LOGGED_IN_KEY',    '#R#kZtUo(%eB4M;7.+q#:qJYHqC)g@f5T?a*4X@yY.~d.,f%c$TQX.~5HjcOS-tz');
define('NONCE_KEY',        'h|gGy~S>WO[.mG6GkQP1TMuQxJ4_{sKpMO&#c{^70+ZS*]xErxG&_C5GsfFvT?tr');
define('AUTH_SALT',        'o7*)0Dz@^->_W<p#bn[Ns)!nG{h&8.x~@oUUd=]y37/WWEcK61ZA#?jm.G3?Ka0I');
define('SECURE_AUTH_SALT', '$K_llN5e8=|[yN[ 6Fnt2`<AaX<pYwTcC..O<|WJzq}O#C0cfH1iC6^~Sh[r(`[<');
define('LOGGED_IN_SALT',   'uIf*$K>VCX0wn)^@0}V/XC|i6lBsaoZT2,ZiL28Tl@yy_Hicw*u r1X@k[}w1A[P');
define('NONCE_SALT',       '~=#6 !4/;oLZDoA(@y.P[?ANDKt.M_lw<NVfIiguTtALk?$KWs:1du^:} wSLBmq');

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
