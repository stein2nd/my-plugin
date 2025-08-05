import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import path from 'path';

export default defineConfig({
    plugins: [react()],
    build: {
        outDir: 'dist',
        emptyOutDir: true,
        rollupOptions: {
            input: {
                blocks: path.resolve( __dirname, 'src/ts/blocks/index.tsx' ),
                classic: path.resolve( __dirname, 'src/ts/classic/index.ts' ),
                style: path.resolve( __dirname, 'src/style/style.scss' ),
                editorStyle: path.resolve( __dirname, 'src/style/editor.scss' )
            },
            output: {
                entryFileNames: 'js/[name].js',
                assetFileNames: 'css/[name].css'
            }
        }
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './src')
        }
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: ''
            }
        }
    }
});