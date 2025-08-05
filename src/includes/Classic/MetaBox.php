<?php
namespace MyPlugin\Classic;

defined('ABSPATH') || exit;

use MyPlugin\Constants;

/**
 * Classic向けMetaBox
 */
class MetaBox {

    /**
     * 「add_meta_boxes」時に、1つまたは複数の画面に、メタボックスを追加する。
     * 「admin_enqueue_scripts」時に、スクリプトとCSSスタイルシートをキューに追加する。
     *
     * @return void
     */
    public static function register() : void {
        add_action(
            'add_meta_boxes', 
            [self::class, 'add_meta_box'] );

        add_action(
            'admin_enqueue_scripts', 
            [self::class, 'enqueue_assets'] );
    }

    /**
     * 「add_meta_boxes」時に、実施するaction。
     * 実施タイミングは、すべての組み込みメタボックスが追加された後。
     *
     * @return void
     */
    public static function add_meta_box() : void {
        add_meta_box(
            'my_plugin_metabox', 
            __( 'My Plugin Meta Box', 'my-plugin' ), 
            [ self::class, 'render_meta_box' ], 
            [ 'post' ], 
            'side');
    }

    /**
     * 1つまたは複数の画面に、メタボックスを追加する。
     *
     * @param [type] $post
     * @return void
     */
    public static function render_meta_box($post) : void {
        echo '<p>' . esc_html__('This is a meta box.', 'my-plugin') . '</p>';
    }

    /**
     * 「admin_enqueue_scripts」時に、実施するaction。
     * 実施タイミングは、すべての管理ページでスクリプトをキューに追加する際。
     *
     * @return void
     */
    public static function enqueue_assets() : void {
        // スクリプトをキューに追加する。
        wp_enqueue_script(
            'my-plugin-classic', 
            plugins_url('dist/js/classic.js', Constants::PLUGIN_BASENAME), 
            [], 
            null, 
            true);

        // CSSスタイルシートをキューに追加する。
        wp_enqueue_style(
            'my-plugin-style', 
            plugins_url('dist/css/style.css', Constants::PLUGIN_BASENAME), 
            [], 
            null);
    }
}