<?php
namespace MyPlugin;

defined('ABSPATH') || exit;

/**
 * クラス横断定数
 */
final class Constants {
    public const TEXT_DOMAIN = 'my-plugin';

    public const OPTION_NAME = 'my_plugin_options';

    public const PLUGIN_VERSION = '1.0.0';

    public const PLUGIN_BASENAME = 'my-plugin/my-plugin.php';

    public const PLUGIN_DIR = __DIR__ . '/../..';

    public const LANG_DIR = '/languages';

    public static function lang_path() : string {
        return dirname(plugin_basename(self::PLUGIN_BASENAME)) . self::LANG_DIR;
    }
}
