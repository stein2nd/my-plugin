<?php
namespace MyPlugin;

defined('ABSPATH') || exit;

require_once __DIR__ . '/Constants.php';
//require_once __DIR__ . '/Admin/SettingsPage.php';
//require_once __DIR__ . '/Classic/MetaBox.php';
//require_once __DIR__ . '/Blocks/Register.php';

use MyPlugin\Constants;
//use MyPlugin\Admin\SettingsPage;
//use MyPlugin\Classic\MetaBox;
//use MyPlugin\Blocks\Register;


/**
 * プラグイン
 */
final class Plugin {

    /**
     * 「plugins_loaded」時に、実施するaction。
     * 実施タイミングは、インストールされたプラグインが読み込まれた後。
     *
     * @return void
     */
    public static function init() : void {
        self::load_textdomain();
        self::register_admin();
        self::register_blocks();
    }

    /**
     * プラグインの、翻訳済み文字列を読み込む。
     *
     * @return void
     */
    private static function load_textdomain() : void {
        $temp_name = Constants::lang_path();

        load_plugin_textdomain(
            'my-plugin', 
            false, 
            $temp_name);
    }

    /**
     * 「管理画面」として、「admin_menu」時に、トップレベルのメニューページを追加する。
     * 「Classic向けMetaBox」として、「add_meta_boxes」時に、メタボックス、スクリプト、CSSスタイルシートを追加する。
     *
     * @return void
     */
    private static function register_admin() : void {
        if ( is_admin() ) {
            require_once __DIR__ . '/Admin/SettingsPage.php';
            require_once __DIR__ . '/Classic/MetaBox.php';

            Admin\SettingsPage::register();
            Classic\MetaBox::register();
            //SettingsPage::register();
            //MetaBox::register();
        }
    }

    /**
     * 「ブロック」として、「init」時に、新しいスクリプトとブロック・タイプを登録する。
     *
     * @return void
     */
    private static function register_blocks() : void {
        if ( function_exists('register_block_type') ) {
            require_once __DIR__ . '/Blocks/Register.php';

            Blocks\Register::register();
            //Register::register();
        }
    }
}