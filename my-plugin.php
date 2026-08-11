<?php
/**
 * Plugin Name: My Plugin
 * Description: Gutenberg + Classic 対応の開発用ベース。
 * Version: 1.0.3
 * Author: Your Name
 * Text Domain: my-plugin
 * Domain Path: /languages
 * License: GPL-3.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
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