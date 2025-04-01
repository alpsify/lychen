import path from 'node:path';

import type { UserConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import mkcert from 'vite-plugin-mkcert';
import { VitePWA } from 'vite-plugin-pwa';
import tailwindcss from '@tailwindcss/vite';

const config: UserConfig = {
  server: {
    https: {},
    port: 8080,
  },
  plugins: [
    tailwindcss(),
    mkcert({
      hosts: ['app.tera.lychen.local'],
    }),
    vue({
      template: {
        transformAssetUrls: {
          includeAbsolute: false,
        },
      },
    }),
    VitePWA({
      registerType: 'autoUpdate',
      manifest: {
        name: 'Tera',
        short_name: 'Tera',
        description: 'Tera application from Lychen ecosystem',
        theme_color: '#ffffff',
        display: 'standalone',
        icons: [
          {
            src: 'logos/tera/pwa-64x64.png',
            sizes: '64x64',
            type: 'image/png',
          },
          {
            src: 'logos/tera/pwa-192x192.png',
            sizes: '192x192',
            type: 'image/png',
          },
          {
            src: 'logos/tera/pwa-512x512.png',
            sizes: '512x512',
            type: 'image/png',
          },
          {
            src: 'logos/tera/maskable-icon-512x512.png',
            sizes: '512x512',
            type: 'image/png',
            purpose: 'maskable',
          },
        ],
      },
    }),
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src'),
      '@pages': path.resolve(__dirname, './src/pages'),
      '@layouts': path.resolve(__dirname, './src/layouts'),
    },
  },
  build: {
    sourcemap: true,
  },
};

export default config;
