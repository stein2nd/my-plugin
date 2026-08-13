<?php
/**
 * My Plugin
 *
 * @package My_Plugin
 * @author Koutarou ISHIKAWA
 * @copyright 2025 Koutarou ISHIKAWA
 * @license GPL v3 or later

 * Plugin Name: My Plugin
 * Plugin URI: https://github.com/stein2nd/my-plugin
 * Description: Gutenberg + Classic 対応の開発用ベース。
 * Version: 1.0.4
 * Author: Koutarou ISHIKAWA
 * Author URI: https://stein2nd.wordpress.com
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: my-plugin
 * Domain Path: /languages
 * Requires at least: 6.3
 * Tested up to: 6.8
 * Requires PHP: 8.2
 * Network: false
 */

defined('ABSPATH') || exit;

use MyPlugin\Constants;

// Gutenberg ブロック読み込み
require_once plugin_dir_path(__FILE__) . 'src/includes/Plugin.php';

add_action(
    'plugins_loaded', 
    function() {
        \MyPlugin\Plugin::init();
    } );