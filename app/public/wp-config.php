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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '_[_UerPQ;9-i;]Fw5q9)=f<>TPf*2<*{Gi6Mf_5TCA0OmYZEEhSnfV6l>/e5|(lz' );
define( 'SECURE_AUTH_KEY',   'CUKxow+=*3OPU ]Px24N$mC9<Og#2?k|Jc|TV-qF~$1p3t[4  mO/g3/GrnX~47I' );
define( 'LOGGED_IN_KEY',     'V!Rj&3LO3I+a6![l+B&PLVY32?0o,)RIHihmjr^WBXQW[I~=MNb>+]GR2m[o<p+`' );
define( 'NONCE_KEY',         ' QarrXk6eAv1^Y,!c3Za%@Wo>Zc@Os]~a)X2w-9WPf}dCksy[|SYr_3NdnvaM@uP' );
define( 'AUTH_SALT',         '$~=G*S0 :y;W4sT0~+buY2hi*|&e;Lj|+>2|>*$YJQZH6TcxX50^7Itu#I>A7w7w' );
define( 'SECURE_AUTH_SALT',  ']o8BT-@N2f$W^zpHfUJcaTiN8oyU<f) 7ZyU<Bzq?_(q_Yhq^/6L}z]T&sjmVW<[' );
define( 'LOGGED_IN_SALT',    '6-H:;,rHo4@N}pW=xDi]}~E#=4=lcb8IHfX+!tnav7T467J|%G7P5:/-n[:H]r>S' );
define( 'NONCE_SALT',        '3QtSZJrk:hnk6m]{+}`/AtzCy]yVSY@;_|8,!y/PKq_tf^XfqbZz3V{nBl%F!Q}]' );
define( 'WP_CACHE_KEY_SALT', '|Mhe0;S=~W{2cvd[7rJo/bO)ri1t8T3`BS^pwd/8Yb=i0t#b5OBGD+H$`)a}{2p3' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
