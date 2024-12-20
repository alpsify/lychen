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
};

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
};

export const numberFormats = {
  'en-US': en,
  'en-GB': en,
  'fr-FR': fr,
};
