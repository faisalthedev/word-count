<?php
  /**
   * Plugin Name:       Word Count
   * Plugin URI:        https://example.com/plugins/wordcount/
   * Description:       Count words from any WP Post
   * Version:           0.0.1
   * Requires at least: 5.2
   * Requires PHP:      7.2
   * Author:            Faisal Ahammad
   * Author URI:        https://faisalahammad.com/
   * License:           GPL v2 or later
   * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
   * Text Domain:       wordcount
   * Domain Path:       /languages
   */

  //  function wordcount_activation_hook() {

  //  }
  //  register_activation_hook( __FILE__, 'wordcount_activation_hook' );

  //  function wordcount_deactivation_hook() {

  //  }
  //  register_deactivation_hook( __FILE__, 'wordcount_deactivation_hook' );

  // Load plugin text domain
  function wordcount_load_textdomain() {
    load_plugin_textdomain( 'wordcount', false,  dirname(__FILE__).'/languages');
  }
  add_action( 'plugins_loaded', 'wordcount_load_textdomain' );