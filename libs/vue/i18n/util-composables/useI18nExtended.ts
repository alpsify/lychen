import { unixDateToDate } from '@lychen/typescript-util-date/UnixDate';
import { useI18n, type UseI18nOptions } from 'vue-i18n';

import { addRootKey } from '@lychen/vue-i18n-util-helpers/RootKeyHelper';

interface UseCustomI18nOptions extends UseI18nOptions {
  rootKey?: string;
  prefixed?: boolean;
}

export function useI18nExtended(options?: UseCustomI18nOptions) {
  if (options) {
    if (!options.useScope) {
      options.useScope = 'global';
    }

    if (options.rootKey && options.messages) {
      options.messages = addRootKey(options.messages, options.rootKey);
    }
  }

  const { n, t, d } = useI18n(options);

  function customT(key: string) {
    if (options?.prefixed) {
      return t(`${options.rootKey}.${key}`);
    }

    return t(key);
  }

  function customN(value: number, keyOrOptions: string | object): string {
    if (keyOrOptions === 'percent') {
      return n(value / 10000, keyOrOptions);
    }

    if (keyOrOptions === 'currency') {
      return n(value / 100, keyOrOptions);
    }

    return n(value, keyOrOptions);
  }

  function customD(value: number | Date | string, keyOrOptions: string | object) {
    if (typeof value === 'number') {
      return d(unixDateToDate(value), keyOrOptions);
    }

    return d(value, keyOrOptions);
  }

  return {
    t: customT,
    d: customD,
    n: customN,
  };
}