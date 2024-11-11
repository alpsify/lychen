import './stylesheet/main.css';

import { createHead } from '@unhead/vue';
import { createApp } from 'vue';
import { createI18n } from 'vue-i18n';

import App from './App.vue';
import router from './router';

import { loadFontAwesomeStyles } from '@lychen/ui-components/icon/AppLoader';

const app = createApp(App);

/* Router */
app.use(router);

loadFontAwesomeStyles();

/* i18n */
const i18n = createI18n({
  globalInjection: false,
  legacy: false,
  fallbackLocale: 'fr-FR',
  locale: navigator.languages[0],
});

app.use(i18n);

/* unhead */
const head = createHead();
app.use(head);

app.mount('#app');
