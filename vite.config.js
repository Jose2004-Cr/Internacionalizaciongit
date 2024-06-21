import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/mapa.css',
                'resources/js/mapa.js',
                'resources/css/home.css',
                'resources/js/home.js'
            ],
            refresh: true,
        }),
    ],
});
