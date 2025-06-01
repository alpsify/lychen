import { type I18nOptions } from 'vue-i18n';

const en = {
  currency: {
    style: 'currency',
    currency: 'EUR',
    currencyDisplay: 'symbol',
  },
  percent: {
    style: 'percent',
    useGrouping: false,
    minimumFractionDigits: 2,
  },
} as const;

const fr = {
  currency: {
    style: 'currency',
    currency: 'EUR',
    currencyDisplay: 'symbol',
    useGrouping: true,
  },
  percent: {
    style: 'percent',
    useGrouping: false,
    minimumFractionDigits: 2,
  },
} as const;

export const numberFormats: I18nOptions['numberFormats'] = {
  'en-US': en,
  'en-GB': en,
  'fr-FR': fr,
};
