import './stylesheet/main.css';

import { createHead } from '@unhead/vue';
import { createSSRApp } from 'vue';
import { createI18n } from 'vue-i18n';

import App from './App.vue';
import router from './router';

import { loadFontAwesomeStyles } from '@lychen/ui-components/icon/AppLoader';

export function createApp() {
  const app = createSSRApp(App);

  /* Router */
  app.use(router);

  loadFontAwesomeStyles();

  /* i18n */
  const i18n = createI18n({
    globalInjection: false,
    legacy: false,
    fallbackLocale: 'fr-FR',
    locale: import.meta.env.SSR ? 'fr-FR' : navigator.languages[0],
  });

  app.use(i18n);

  /* unhead */
  const head = createHead();
  app.use(head);

  //app.mount('#app');

  return { app, router };
}
