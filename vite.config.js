import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        port: 5173,
        host: true,
        https: {
            key: "/etc/letsencrypt/live/sosmujer.me/privkey.pem",
            cert: "/etc/letsencrypt/live/sosmujer.me/fullchain.pem",
        },
        strictPort: true,
        hmr: {
            host: '137.184.92.33',
        },
    }
});
