import './stylesheet/main.css';

import { createI18n } from 'vue-i18n';

import { ViteSSG } from 'vite-ssg';

import App from './App.vue';
import routes from './router/routes';
import { loadFontAwesomeStyles } from '@lychen/ui-components/icon/AppLoader';
import type { RouterScrollBehavior } from 'vue-router';
import { VuePlausible } from 'vue-plausible';

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

    const i18n = createI18n({
      globalInjection: false,
      legacy: false,
      fallbackLocale: 'fr-FR',
      locale: import.meta.env.SSR ? 'fr-FR' : navigator.languages[0],
    });

    app.use(i18n);

    app.use(VuePlausible, {
      domain: 'lychen.fr',
      trackLocalhost: false,
    });
  },
);
