<?php
namespace MyPlugin\Blocks;

defined('ABSPATH') || exit;

use MyPlugin\Constants;

/**
 * ブロック
 */
class Register {

    /**
     * 「init」時に、新しいスクリプトとブロック・タイプを登録する。
     *
     * @return void
     */
    public static function register() : void {
        add_action(
            'init', 
            [self::class, 'register_block'] );
    }

    /**
     * 「init」時に、実施するaction。
     * 実施タイミングは、WordPress の読み込みが完了した後、ヘッダーが送信される前。
     *
     * @return void
     */
    public static function register_block() : void {
        // 新しいスクリプトを登録する。
        wp_register_script(
            'my-plugin-blocks', 
            plugins_url('dist/js/blocks.js', Constants::PLUGIN_BASENAME), 
            ['wp-blocks', 'wp-element', 'wp-editor'], 
            null, 
            true);

        // (block.jsonに記載されたメタデータを介して)ブロック・タイプ「sample」ブロック・タイプを登録する。
        register_block_type(
            'my-plugin/sample-block', 
            ['editor_script' => 'my-plugin-blocks']);
    }
}