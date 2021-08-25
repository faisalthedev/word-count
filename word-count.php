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

  // Count function
  function wordcount_count_words($content) {
    // strip / remove html tags from post
    $stripped_content = strip_tags($content);
    // count word
    $word_count = str_word_count($stripped_content);
    // Label / Displayed text
    $label_text = __('Total number of words', 'wordcount');
    // Add filter
    $label_text = apply_filters('wordcount_heading', $label_text);
    // Tag filter
    $tag = apply_filters('wordcount_tag', 'h2');
    // show the content
    $content .= sprintf("<%s>%s: %s</%s>", $tag, $label_text, $word_count, $tag);
    // return content
    return $content;
  }
  add_filter( 'the_content', 'wordcount_count_words');

  // Add reading time
  function wordcount_reading_time($content) {
    // strip / remove html tags from post
    $stripped_content = strip_tags($content);
    // count word
    $word_count = str_word_count($stripped_content);
    // reading min
    $reading_min = floor($word_count / 200);
    // reading seconds
    $reading_sec = floor($word_count % 200 / (200/60));
    // Check visibility
    $is_visiable = apply_filters('wordcount_display_readingtime', 1);
    if($is_visiable) {
      $label = __('Total reading time', 'wordcount');
      $label = apply_filters('wordcount_readingtime_heading', $label);
      $tag = apply_filters('wordcount_readingtime_tag', 'h4');
      $content .= sprintf("<%s>%s: %s minutes, %s seconds</%s>", $tag, $label, $reading_min, $reading_sec, $tag);
    }

    return $content;
  }
  add_filter('the_content', 'wordcount_reading_time');