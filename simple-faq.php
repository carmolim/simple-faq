<?php
/**
* Plugin Name: Massimo Simple FAQ
* Plugin URI: http://augustocarmo.com.br/plugins
* Description: A brief description about your plugin.
* Version: 1.0
* Author: Augusto Carmo
* Author URI: http://augustocarmo.com.br/
* License: A "Slug" license name e.g. GPL12
*/

define( 'SFAQ_VERSION', '1.0' );

define( 'SFAQ_PLUGIN', __FILE__ );

define( 'SFAQ_PLUGIN_BASENAME', plugin_basename( SFAQ_PLUGIN ) );

define( 'SFAQ_PLUGIN_NAME', trim( dirname( SFAQ_PLUGIN_BASENAME ), '/' ) );

define( 'SFAQ_PLUGIN_DIR', untrailingslashit( dirname( SFAQ_PLUGIN ) ) );

define( 'SFAQ_PLUGIN_MODULES_DIR', SFAQ_PLUGIN_DIR . '/modules' );

define( 'SFAQ_CTP', 'simple-faq' );


/**
 * Load all settings
 */
require_once SFAQ_PLUGIN_DIR . '/settings.php';

?>
