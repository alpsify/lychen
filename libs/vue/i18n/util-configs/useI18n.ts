import { createI18n, type I18nOptions } from 'vue-i18n';
import { type App } from 'vue';
import { configSSG } from './ConfigSSG';
import { configDefault } from './ConfigDefault';

export function useI18n(app: App, config?: I18nOptions) {
  if (!config) {
    if (import.meta.env.SSR && import.meta.env.VITE_SSG) {
      config = configSSG();
    } else {
      config = configDefault();
    }
  }

  const i18n = createI18n(config);
  app.use(i18n);
}
