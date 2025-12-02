<?php
/**
 * Plugin Name: Parallax Cover Video
 * Plugin URI: https://derekhanson.blog/parallax-cover-video/
 * Description: Adds parallax video effect to WordPress Cover blocks. Toggle the "Parallax Video" style in the block editor to enable smooth scrolling parallax effects on video backgrounds.
 * Version: 1.0.0
 * Author: Derek Hanson
 * Author URI: https://derekhanson.blog
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: parallax-cover-video
 * Requires at least: 5.8
 * Requires PHP: 7.2
 *
 * @package ParallaxCoverVideo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin constants.
define( 'PARALLAX_COVER_VIDEO_VERSION', '1.0.0' );
define( 'PARALLAX_COVER_VIDEO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PARALLAX_COVER_VIDEO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Enqueues frontend styles for parallax cover video.
 *
 * @return void
 */
function parallax_cover_video_enqueue_styles() {
	wp_enqueue_style(
		'parallax-cover-video',
		PARALLAX_COVER_VIDEO_PLUGIN_URL . 'assets/css/parallax-cover.css',
		array(),
		PARALLAX_COVER_VIDEO_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'parallax_cover_video_enqueue_styles' );

/**
 * Enqueues frontend script for parallax effect.
 *
 * @return void
 */
function parallax_cover_video_enqueue_script() {
	wp_enqueue_script(
		'parallax-cover-video',
		PARALLAX_COVER_VIDEO_PLUGIN_URL . 'assets/js/parallax-video.js',
		array(),
		PARALLAX_COVER_VIDEO_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'parallax_cover_video_enqueue_script' );

/**
 * Enqueues editor script for block style registration.
 *
 * @return void
 */
function parallax_cover_video_enqueue_editor_script() {
	wp_enqueue_script(
		'parallax-cover-video-editor',
		PARALLAX_COVER_VIDEO_PLUGIN_URL . 'assets/js/parallax-cover-editor.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		PARALLAX_COVER_VIDEO_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'parallax_cover_video_enqueue_editor_script' );

/**
 * Adds has-parallax-video class when is-style-has-parallax-video is present.
 *
 * This ensures compatibility with both class names.
 *
 * @param string $block_content The block content.
 * @param array  $block         The block data.
 * @return string The modified block content.
 */
function parallax_cover_video_add_class( $block_content, $block ) {
	if ( isset( $block['blockName'] ) && 'core/cover' === $block['blockName'] ) {
		if ( isset( $block['attrs']['className'] ) && strpos( $block['attrs']['className'], 'is-style-has-parallax-video' ) !== false ) {
			// Add has-parallax-video class if not already present.
			if ( strpos( $block_content, 'has-parallax-video' ) === false ) {
				$block_content = preg_replace(
					'/(<div[^>]*class="[^"]*wp-block-cover[^"]*)/',
					'$1 has-parallax-video',
					$block_content
				);
			}
		}
	}
	return $block_content;
}
add_filter( 'render_block', 'parallax_cover_video_add_class', 10, 2 );

