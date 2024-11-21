import { useI18nExtended } from '@lychen/vue-util-i18n/useI18nExtended';

import enUs from './en-US';
import frFr from './fr-FR';

export const messages = {
  'fr-FR': frFr,
  'en-US': enUs,
  'en-GB': enUs,
};

export const TRANSLATION_KEY = 'page_home';

export function useTranslations(rootKey: string = TRANSLATION_KEY) {
  const { t, d, n } = useI18nExtended({ messages, rootKey });

  function tPrefixed(key: string) {
    return t(`${TRANSLATION_KEY}.${key}`);
  }

  return { t: tPrefixed, d, n };
}
