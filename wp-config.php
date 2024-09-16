<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'C1BO<D]IL!|hJCeLvXzNiW43.N9E6EEnh.Jf-g]7o[01>5iI%IN!5V`-9[y7BHF3' );
define( 'SECURE_AUTH_KEY',  '{r]5[D<QwCzjN{x.&<N)=ybfPE!i,GDs,.yt0e8v^;~pM4WYz^.B}gW&_x+A0@!B' );
define( 'LOGGED_IN_KEY',    ':Oa>bG~:&*t#1l:(-Jl9#cileUm;}[-BMBz!$M`jeoSEa,E:2.i7-ISL&GeU.KYd' );
define( 'NONCE_KEY',        ',bTPI(P}P^V:G{8r?GNZX~<+;T^lA}&E@/BW3oeK_;Es*OnS`2/!a;Ci-~_X8o-B' );
define( 'AUTH_SALT',        'cy3)luY2zH278IL,<6LlWL(PHCHs=3=BTa%I]&Ra%WCKv~Y9Vbg.^<n1|V/d5<Z)' );
define( 'SECURE_AUTH_SALT', 'Yzlh8L+G{;:8NJRZJ#ox8@cg)]`p%ZQ50YRk>U(DKH$jQLbFh%w/Y)0Hq@gr eRN' );
define( 'LOGGED_IN_SALT',   'o/3G|6=o`E`W(;$FyZ3OY~`$j&%$/u(dalc]AWtTn0~`<}>Yi)@+ZZS*SX1nur<*' );
define( 'NONCE_SALT',       'Yf1BC{C~uUaDN5f8d@M/B,b*F)5(]^a_kLr!TETwoH3$;H)?zh8L[$~:{P0N6N3l' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
