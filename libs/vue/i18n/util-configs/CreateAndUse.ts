import { createI18n, type I18nOptions } from 'vue-i18n';
import { configDefault } from './ConfigDefault';
import { type App } from 'vue';

export function createAndUse(app: App, config: I18nOptions = configDefault) {
  const i18n = createI18n(config);
  app.use(i18n);
}
