import { defineConfig, esmExternalRequirePlugin, type UserConfig } from 'vite';
import react from '@vitejs/plugin-react';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));

/** WordPress provides these at runtime — do not bundle them. */
export const wordpressExternals = [
    'react',
    'react-dom',
    '@wordpress/blocks',
    '@wordpress/block-editor',
    '@wordpress/element',
    '@wordpress/i18n',
] as const;

export const wordpressGlobals: Record<
    (typeof wordpressExternals)[number],
    string
> = {
    react: 'React',
    'react-dom': 'ReactDOM',
    '@wordpress/blocks': 'wp.blocks',
    '@wordpress/block-editor': 'wp.blockEditor',
    '@wordpress/element': 'wp.element',
    '@wordpress/i18n': 'wp.i18n',
};

const sharedResolve = {
    alias: {
        '@': path.resolve(__dirname, './src'),
    },
};

const sharedCss = {
    preprocessorOptions: {
        scss: {
            additionalData: '',
        },
    },
};

export function createScriptConfig(
    name: string,
    entry: string,
    emptyOutDir: boolean,
): UserConfig {
    return {
        plugins: [
            react({ jsxRuntime: 'classic' }),
            esmExternalRequirePlugin({
                external: [...wordpressExternals],
            }),
        ],
        build: {
            outDir: 'dist',
            emptyOutDir,
            rolldownOptions: {
                input: {
                    [name]: path.resolve(__dirname, entry),
                },
                output: {
                    format: 'iife',
                    entryFileNames: 'js/[name].js',
                    assetFileNames: 'css/[name].css',
                    globals: wordpressGlobals,
                },
            },
        },
        resolve: sharedResolve,
        css: sharedCss,
    };
}

export function createStyleConfig(): UserConfig {
    return {
        build: {
            outDir: 'dist',
            emptyOutDir: false,
            rolldownOptions: {
                input: {
                    style: path.resolve(__dirname, 'src/style/style.scss'),
                    editorStyle: path.resolve(
                        __dirname,
                        'src/style/editor.scss',
                    ),
                },
                output: {
                    assetFileNames: 'css/[name].css',
                },
            },
        },
        resolve: sharedResolve,
        css: sharedCss,
    };
}

// Default `vite` / single `vite build` targets the blocks bundle.
export default defineConfig(
    createScriptConfig('blocks', 'src/ts/blocks/index.tsx', true),
);
