import { defineNuxtConfig } from 'nuxt/config';
import { createResolver } from '@nuxt/kit';

// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  future: {
    compatibilityVersion: 4,
  },

  devtools: { enabled: true },

  devServer: {
    port: 8080,
  },

  css: ['./assets/css/main.css'],

  compatibilityDate: '2024-11-12',

  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },

  vite: {},
});
