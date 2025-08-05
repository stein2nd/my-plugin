<?php
/**
 * Plugin Name: My Plugin
 * Description: Gutenberg + Classic 対応の開発用ベース。
 * Version: 0.1.0
 * Author: Your Name
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