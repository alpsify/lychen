import path from 'node:path';

import type { UserConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import autoprefixer from 'autoprefixer';
import tailwind from 'tailwindcss';
import mkcert from 'vite-plugin-mkcert';
import generateSitemap from 'vite-ssg-sitemap';

const config: UserConfig = {
  server: {
    https: {},
    port: 8080,
  },
  css: {
    postcss: {
      plugins: [tailwind(), autoprefixer()],
    },
  },
  plugins: [
    mkcert({
      hosts: ['lychen.local'],
    }),
    vue({
      template: {
        transformAssetUrls: {
          includeAbsolute: false,
        },
      },
    }),
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src'),
      '@assets': path.resolve(__dirname, './src/assets'),
      '@pages': path.resolve(__dirname, './src/pages'),
      '@layouts': path.resolve(__dirname, './src/layouts'),
    },
  },
  ssgOptions: {
    script: 'async',
    formatting: 'prettify',
    onFinished() {
      generateSitemap();
    },
  },
};

export default config;
