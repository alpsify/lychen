import path from 'node:path';

import vue from '@vitejs/plugin-vue';
import tailwindcss from '@tailwindcss/vite';
import { defineConfig } from 'vite';
import mkcert from 'vite-plugin-mkcert';
import { VitePWA } from 'vite-plugin-pwa';

// https://vitejs.dev/config/
export default defineConfig({
  server: {
    https: {},
    port: 8080,
  },

  plugins: [
    tailwindcss(),
    mkcert({
      hosts: ['kiro.member.lychen.local'],
    }),
    vue(),
    VitePWA({ registerType: 'autoUpdate' }),
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src'),
      '@assets': path.resolve(__dirname, './src/assets'),
    },
  },
});
