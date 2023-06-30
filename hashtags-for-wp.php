<?php

/**
 * Plugin Name: Hashtags for WP
 * Plugin URI: https://wordpress.org/plugins/hashtags-for-wp/
 * Description: The plugin automatically searches for native tags within the post content and adds a linked hashtag symbol before each one.
 * Version: 1.0.3
 * Author: Matteo Barbero
 * Author URI: https://profiles.wordpress.org/maiobarbero/
 */

use HashtagsForWp\HashtagsForWp;

if (!defined('ABSPATH')) {
  exit;
}

require_once(plugin_dir_path(__FILE__) . 'includes/HashtagsForWp.php');


// Inizializzazione del plugin
function hashtags_for_wp_init()
{
  $hashtag_for_wp = new HashtagsForWp();
}

add_action('plugins_loaded', 'hashtags_for_wp_init');
