import './stylesheet/main.css';

import { ViteSSG } from 'vite-ssg';

import App from './App.vue';
import routes from './router/routes';
import { loadFontAwesomeStyles } from '@lychen/ui-components/icon/AppLoader';
import type { RouterScrollBehavior } from 'vue-router';
import { configSSG } from '@lychen/vue-i18n-util-configs/ConfigSSG';
import { createAndUse } from '@lychen/vue-i18n-util-configs/CreateAndUse';

// eslint-disable-next-line func-style
const scrollBehavior: RouterScrollBehavior = (to, from, savedPosition) => {
  if (to.hash) {
    return {
      el: to.hash,
      behavior: 'smooth',
    };
  }

  return { top: 0 };
};

export const createApp = ViteSSG(
  App,
  {
    routes,
    scrollBehavior,
    base: import.meta.env.BASE_URL,
  },
  ({ app, router, routes, isClient, initialState }) => {
    loadFontAwesomeStyles();
    createAndUse(app, configSSG);
  },
);
