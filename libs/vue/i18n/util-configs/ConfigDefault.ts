import { datetimeFormats } from './DatetimeFormat';
import { defaultFallbackLocale, defaultLocale } from './Default';
import { numberFormats } from './NumberFormat';

export function configDefault() {
  return {
    datetimeFormats: datetimeFormats,
    numberFormats: numberFormats,
    fallbackLocale: defaultFallbackLocale,
    globalInjection: true,
    legacy: false,
    locale: navigator.languages[0] ?? defaultLocale,
  };
}
