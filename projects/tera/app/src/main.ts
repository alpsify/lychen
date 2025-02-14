import './stylesheet/main.css';

import { createApp } from 'vue';
import { loadFontAwesomeStyles } from '@lychen/ui-components/icon/AppLoader';

import zitadelAuth from '@lychen/typescript-util-zitadel/ZitadelAuth';
import { useI18n } from '@lychen/vue-i18n-util-configs/useI18n';

import App from './App.vue';
import router from './router';

const app = createApp(App);

loadFontAwesomeStyles();

/* Router */
app.use(router);

/* i18n */
useI18n(app);

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
