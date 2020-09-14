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

/** Turn off revisions posts */
define('WP_POST_REVISIONS', false);

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'QDNgiZxz0oUxnZbc+0Fq2mRufW+AV1n9Hm1xQvQqyoORtIZ4DIxk24f2uxcH+z1zD0nGH4LifW0vp8Nh34Q5NA==');
define('SECURE_AUTH_KEY',  'Fnde7tcW6wjdTQCBn0+GN8bBBlnZvMBSw/Spy1iac0xfICQjsfqHWFzl0fr8sYYE2a7I5G4yqRM3drmVCCSH4Q==');
define('LOGGED_IN_KEY',    '3VRSnf1QW+cH1LZYELW56+B3dXQKHVYAcahEh/STwjc2jLcYS6HlgNecNLYQNs8Lg9G+PhiiCA7mD6BUZCVfkw==');
define('NONCE_KEY',        'p88iV57eWOrBh+5e84+tkM5v2bXNQUJ1etKcF2bdndizqvuQfRmrg0tuMAamNNFYWStj/u2UXGQOamIZJjQiQA==');
define('AUTH_SALT',        'yN+YTEFJWI31JErghlBiGlJ/F53i77b5isVrgUh0oTFhJDL6goUnKAsG6DWjP0EAnb5boVEAA8jzmzpY71clcw==');
define('SECURE_AUTH_SALT', 't8nI7Ya6jyBy1NcnO+fxxVpFvcSM7auz+DXzcNcy5LxStRL7F9x/1pco9OkZ/VyCq8AhSfROHkhwhE0YuCb/eg==');
define('LOGGED_IN_SALT',   'FM4m+eEfbNQG0gv3qMnsCw50DnFIL+++ixx7vhqFEkQB/5vGu+HVFn41q0QHAOy4QOy8rLxZWxEz0FbFMWuHIg==');
define('NONCE_SALT',       '7knCn57mU42zT9lUkXqpTUhG88deAk7hc/2Oj1NWNjagBass5A6lKSPf9hZ1603RGZayzfw774gaA6D5k32zhQ==');

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
