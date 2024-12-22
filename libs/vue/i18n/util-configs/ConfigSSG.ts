import { datetimeFormats } from './DatetimeFormat';
import { defaultFallbackLocale, defaultLocale } from './Default';
import { numberFormats } from './NumberFormat';

export const configSSG = {
  datetimeFormats: datetimeFormats,
  numberFormats: numberFormats,
  fallbackLocale: defaultFallbackLocale,
  globalInjection: true,
  legacy: false,
  locale: import.meta.env.SSR ? defaultLocale : navigator.languages[0],
};
