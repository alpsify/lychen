import "./stylesheet/main.css";

import { library } from "@fortawesome/fontawesome-svg-core";
import { fal } from "@fortawesome/pro-light-svg-icons";
//import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { createApp } from "vue";
import { createI18n } from "vue-i18n";

import zitadelAuth from "@/services/ZitadelAuth";

import App from "./App.vue";
import router from "./router";

const app = createApp(App);

/* FontAwesome */
library.add(fal);
//app.component('FontAwesomeIcon', FontAwesomeIcon);

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
declare module "vue" {
  interface ComponentCustomProperties {
    $zitadel: typeof zitadelAuth;
  }
}
zitadelAuth.oidcAuth.startup().then((ok) => {
  if (ok) {
    app.config.globalProperties.$zitadel = zitadelAuth;
  }
});

app.mount("#app");
