import { useI18nExtended } from '@lychen/vue-util-i18n/useI18nExtended';

import enUs from './en-US';
import frFr from './fr-FR';

export const messages = {
  'fr-FR': frFr,
  'en-US': enUs,
  'en-GB': enUs,
};

export const TRANSLATION_KEY = 'lychen_global';

export function useTranslations(rootKey: string = TRANSLATION_KEY) {
  return useI18nExtended({ messages, rootKey });
}
