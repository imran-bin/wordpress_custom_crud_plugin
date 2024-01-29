<?php
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
define( 'DB_NAME', 'test_wd' );

/** Database username */
define( 'DB_USER', 'valet' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         'HS.-)-E:-gT[b!Wl5GKFw&##c h/`% F=O:9a$}uxFXn?,!9>0vDv p[Vez^R?C%' );
define( 'SECURE_AUTH_KEY',  ' 2+h=lK^1O<G_1 ^f$_Qven_`9Df+LdE;wJ]*%)|5t{?tG3(G1Ayt_F[wC>;+>G&' );
define( 'LOGGED_IN_KEY',    'Eek>eBIO(9K.cMp6k4|&4qI^s1b4q_|&RgL:v>1n/edWs,uUjP|07cV&ZVI![lT]' );
define( 'NONCE_KEY',        'L8~2o{ S~ikJIOfkh2.gQ.sRPL)CUO4vLerw]XE*nKQA61H/dr&Lt*x2-/:z+PIY' );
define( 'AUTH_SALT',        'l#2al>M.J=wDPG4[wCI)4)6,(!^YY%(`ITn%UYSqlj-w!<j6bwxP;T@=}E?@,vS!' );
define( 'SECURE_AUTH_SALT', 'Np=^3fxUpnapM5W_]}3Cksu$4HYN@?41SeV`70D!UkNq~4Hrk$&Qry/@.B2M&K|g' );
define( 'LOGGED_IN_SALT',   'g]Q4hQFFr,#^C2<5i8AZ;1I%4,38X)/COg~SQ(]IwfybvS6cR 7oME.@.Z7jD6m ' );
define( 'NONCE_SALT',       'sWsz-)Os<nc97}.17!BLxgHd Q^1[TpR|vl1d[G%jXSV-)QD31]=*~Dd9SsfZo)B' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
