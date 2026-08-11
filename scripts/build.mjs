import { build } from 'vite';
import { createScriptConfig, createStyleConfig } from '../vite.config.mts';

const watch = process.argv.includes('--watch');

const configs = [
    createScriptConfig('blocks', 'src/ts/blocks/index.tsx', !watch),
    createScriptConfig('classic', 'src/ts/classic/index.ts', false),
    createStyleConfig(),
];

if (watch) {
    await Promise.all(
        configs.map((config) =>
            build({
                ...config,
                configFile: false,
                build: {
                    ...config.build,
                    emptyOutDir: false,
                    watch: {},
                },
            }),
        ),
    );
} else {
    for (const config of configs) {
        await build({ ...config, configFile: false });
    }
}
