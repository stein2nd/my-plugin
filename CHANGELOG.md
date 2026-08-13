# my-plugin - CHANGELOG

## unreleased

## 1.0.4 - 2026-08-13

* プラグインヘッダーを整備 (`Plugin URI` / `Author URI` / `Requires at least` / `Tested up to` / `Requires PHP` / `Network`)
* ファイル先頭の DocBlock (`@package` / `@author` / `@copyright` / `@license`) を追加。Author を実名に更新

## 1.0.3 - 2026-08-11

* npm 依存を最新化。`package.json` の description / license を更新 (GPL-3.0-or-later)
* 不要な `@types/wordpress__*` を削除し、`@wordpress/block-editor` の型をローカル宣言に移行 (`uuid` 由来の moderate 脆弱性も解消)
* ESLint flat config を追加。`lint` スクリプトの glob を修正。TypeScript v7向けに `@typescript/typescript6` を side-by-side 導入
* Prettier の `format` スクリプトを修正し、設定 (`.prettierrc.json` / `.prettierignore`) を追加
* Vite を `vite.config.mts` + `scripts/build.mjs` に再構成。`@wordpress/*` / React を external 化しバンドル肥大化を解消
* ブロック用スクリプト依存を `wp-block-editor` / `wp-i18n` / `react` などに更新。SampleBlock の `registerBlockType` 呼び出しを型安全に修正

## 1.0.2 - 2026-08-08

* TypeScript v7向けに `tsconfig.json` を更新 (`moduleResolution: bundler`、非推奨の `baseUrl` を削除)

## 1.0.1 - 2026-08-08

* npm 依存を最新化 (React v19.2.8、TypeScript v7、Vite v8.2、@wordpress/* など)
