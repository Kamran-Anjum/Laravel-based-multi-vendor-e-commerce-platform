import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import copy from 'rollup-plugin-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/app.scss',
            ],
            refresh: true,
        }),
        copy({
            targets: [
                { src: 'resources/img/**/*', dest: 'public/assets/img' },
                { src: 'resources/fonts/**/*', dest: 'public/assets/fonts' },
                { src: 'resources/js/**/**/*', dest: 'public/assets/js' },
            ]
        })
    ],
    build: {
        rollupOptions: {
            output: {
                assetFileNames: (assetInfo) => {
                    let extType = assetInfo.name.split('.').pop();
                    if (/\.(gif|jpe?g|png|svg)$/.test(extType)) {
                        extType = 'img';
                    } else if (/\.(woff2?|eot|ttf|otf)$/.test(extType)) {
                        extType = 'fonts';
                    }
                    return `${extType}/[name]-[hash][extname]`;
                },
            },
        },
    },
});
