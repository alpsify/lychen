import './stylesheet/main.css';

import { createApp } from 'vue';
import { createI18n } from 'vue-i18n';
import { loadFontAwesomeStyles } from '@lychen/ui-components/icon/AppLoader';

import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';

import App from './App.vue';
import router from './router';

const app = createApp(App);

/* FontAwesome */
loadFontAwesomeStyles();

/* Router */
app.use(router);

/* i18n */
const i18n = createI18n({
  globalInjection: false,
  legacy: false,
  fallbackLocale: navigator.languages[0],
  locale: navigator.languages[0],
});
app.use(i18n);

/* Zitadel */
declare module 'vue' {
  interface ComponentCustomProperties {
    $zitadel: typeof zitadelAuth;
  }
}
zitadelAuth.oidcAuth.startup().then((ok) => {
  if (ok) {
    app.config.globalProperties.$zitadel = zitadelAuth;
  }
});

app.mount('#app');
