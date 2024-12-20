import { defaultDatetimeFormats } from './DatetimeFormat';
import { defaultFallbackLocale, defaultLocale } from './Default';
import { numberFormats } from './NumberFormat';

export const defaultConfig = {
  datetimeFormats: defaultDatetimeFormats,
  numberFormats: numberFormats,
  fallbackLocale: defaultFallbackLocale,
  globalInjection: true,
  legacy: false,
  locale: navigator.languages[0] ?? defaultLocale,
};
