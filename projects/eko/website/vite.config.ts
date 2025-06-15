import path from 'node:path';

import type { UserConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import tailwindcss from '@tailwindcss/vite';
import mkcert from 'vite-plugin-mkcert';
import generateSitemap from 'vite-ssg-sitemap';
import vueDevTools from 'vite-plugin-vue-devtools';

const config: UserConfig = {
  server: {
    https: {},
    port: 8080,
  },

  plugins: [
    vueDevTools(),
    tailwindcss(),
    mkcert({
      hosts: ['eko.lychen.local'],
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
      '@pages': path.resolve(__dirname, './src/pages'),
      '@layouts': path.resolve(__dirname, './src/layouts'),
    },
  },
  ssgOptions: {
    script: 'async',
    formatting: 'prettify',
    onFinished() {
      generateSitemap({ hostname: `https://${process.env.VITE_UNHEAD_HOST}` });
    },
  },
};

export default config;
