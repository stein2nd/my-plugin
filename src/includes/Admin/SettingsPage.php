<?php
namespace MyPlugin\Admin;

defined('ABSPATH') || exit;

use MyPlugin\Constants;

/**
 * 管理画面
 */
class SettingsPage {

    /**
     * 「admin_menu」時に、トップレベルのメニューページを追加する。
     *
     * @return void
     */
    public static function register() : void {
        add_action(
            'admin_menu', 
            [self::class, 'add_menu'] );
    }

    /**
     * 「admin_menu」時に、実施するaction。
     * 実施タイミングは、管理画面のメニューが読み込まれる前。
     *
     * @return void
     */
    public static function add_menu() : void {
        // トップレベルのメニューページを追加する。
        add_menu_page( 
            __( 'My Plugin Settings', 'my-plugin' ),
            __( 'My Plugin', 'my-plugin' ),
            'manage_options',
            'my-plugin',
            [self::class, 'render_page'],
            'dashicons_admin_generic' );
    }

    /**
     * 「トップレベルのメニューページ」として出力する、コンテンツ。
     *
     * @return void
     */
    public static function render_page() : void {
        echo '<div class="wrap"><h1>' . __( 'My Plugin Settings', 'my-plugin' ) . '</h1><div>';
    }
}