import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/calendario.css',
                'resources/js/app.js',
                'resources/js/calendario.js',

            ],
            refresh: true,
        }),
    ],
});
