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

if (strstr($_SERVER['SERVER_NAME'], 'fictional-university.local')) {


	/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

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



} else {


	/** The name of the database for WordPress */
define( 'DB_NAME', 'dbnteiwblmcoum' );

/** MySQL database username */
define( 'DB_USER', 'ut8a35c4c3x78' );

/** MySQL database password */
define( 'DB_PASSWORD', '#1|o$24(1q1#' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );


}




/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'qbi5QM1ra5YIVEs/7j0vunQCcXfiaTCvV83bn5h4VazhXREqbyBTvYnhaPXyI0ojs0HBE0Z8Q/ipY5klofQoQQ==');
define('SECURE_AUTH_KEY',  'CrYPFaz3NCqLANOxwg+gT/7W3u7WfWiakIHFteCc7k3n6jAoaD0OcSN7UdZKCPuk5WxXBx1cOsh1EPNInArKeQ==');
define('LOGGED_IN_KEY',    'kYzs6DF2vn/k1Pb8kAv9E7LUw5mM8XRl6lAnmYhcFZBLZwCXB64hn9LYKgQQOO+YfluQrbDj+r4FQ1smvrz+vQ==');
define('NONCE_KEY',        'NBKD5vee2xxFDTDeWbq6b36qY6dACLlJFIKH+oJGattrH1GGm4TwlAP5Uf2DubHW4Q1I6zz1yKmu+I/7XjBrbQ==');
define('AUTH_SALT',        'qZFJ6T+eneC/3zwOdpvGuPO7DHTWBG0EizdRBYXJmo5mYjCjTN+FTuSDDJ2BL2YJK2ESXNTjLCpFG6QpHSKmhA==');
define('SECURE_AUTH_SALT', 'hk56bY4REVcBaDK7QP/a5+ptjQiSmt+0X/hbIyEQ9bYLHpGc5f/O/kD8fifZ+8VeU5+CE49e6b2uEFls+1Cvww==');
define('LOGGED_IN_SALT',   'p8IU2VvY9R0xAhUxbHkkSKcVh9uAGWTE46+KF22jCdoDB7QB1jV83LJ5f87E3bm0wkJugf9xlB+fEtWih5t1vg==');
define('NONCE_SALT',       '3a1rRewemBApTqSzvzv6IKy7UPil76KuhfBNNwGNZg2oqbhIkPtwYjcGvSNUDVlfbFUMF/ma7uPM6k6OuopTvQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
