import "./stylesheet/main.css";

import { library } from "@fortawesome/fontawesome-svg-core";
import { fal } from "@fortawesome/pro-light-svg-icons";
import { createHead } from "@unhead/vue";
import { createApp } from "vue";
import { createI18n } from "vue-i18n";

import App from "./App.vue";
import router from "./router";

const app = createApp(App);

/* FontAwesome */
library.add(fal);

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

/* unhead */
const head = createHead();
app.use(head);

app.mount("#app");
