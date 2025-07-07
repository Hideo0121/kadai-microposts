import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: process.env.NODE_ENV === 'production' 
        ? (process.env.VITE_APP_URL || 'https://microposts-hkprj-home.fly.dev') + '/'
        : '/',
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});