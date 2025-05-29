<?php
/**
 * Plugin Name: Accessible Testimonial Block
 * Description: A custom testimonial block built with accessibility as the foundation.
 * Version: 1.0.0
 * Author: Robert DeVore
 * Author URI: https://robertdevore.com
 * Text Domain: a11y-block
 * Domain Path: /languages
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || exit;

define( 'A11Y_TESTIMONIAL_VERSION', '1.0.0' );
define( 'A11Y_TESTIMONIAL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'A11Y_TESTIMONIAL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Load plugin text domain for translations.
 *
 * @since  1.0.0
 * @return void
 */
function a11y_testimonial_block_init() {
	// Register the block with explicit script registration.
	wp_register_script(
		'a11y-testimonial-block-editor',
		plugin_dir_url( __FILE__ ) . 'block.js',
		[ 'wp-blocks', 'wp-element', 'wp-editor', 'wp-i18n', 'wp-block-editor' ],
		A11Y_TESTIMONIAL_VERSION
	);

	register_block_type( __DIR__ . '/block.json', array(
		'editor_script' => 'a11y-testimonial-block-editor',
		'render_callback' => 'a11y_render_testimonial_block'
	) );
}
add_action( 'init', 'a11y_testimonial_block_init' );

// Include the render function.
require_once plugin_dir_path( __FILE__ ) . 'render.php';
