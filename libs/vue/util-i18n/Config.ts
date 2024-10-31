export const defaultLocale = 'fr-FR';
export const defaultFallbackLocale = defaultLocale;

export interface DatetimeSchema {
  long: {
    day: '2-digit';
    hour: 'numeric';
    minute: 'numeric';
    month: 'short';
    year: 'numeric';
  };
  'month-year': {
    month: 'short';
    year: 'numeric';
  };
  numeric: {
    day: '2-digit';
    month: '2-digit';
    year: 'numeric';
  };
  short: {
    day: '2-digit';
    month: 'short';
    year: 'numeric';
  };
  time: {
    hour: 'numeric';
    minute: 'numeric';
  };
}

export const defaultDatetimeFormats = {
  'en-US': {
    long: {
      day: '2-digit',
      hour: 'numeric',
      minute: 'numeric',
      month: 'short',
      year: 'numeric',
    },
    'month-year': {
      month: 'short',
      year: 'numeric',
    },
    numeric: {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric',
    },
    short: {
      day: '2-digit',
      month: 'short',
      year: 'numeric',
    },
    time: {
      hour: 'numeric',
      minute: 'numeric',
    },
  },
  'fr-FR': {
    long: {
      day: '2-digit',
      hour: 'numeric',
      minute: 'numeric',
      month: 'short',
      year: 'numeric',
    },
    'month-year': {
      month: 'short',
      year: 'numeric',
    },
    numeric: {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric',
    },
    short: {
      day: '2-digit',
      month: 'short',
      year: 'numeric',
    },
    time: {
      hour: 'numeric',
      minute: 'numeric',
    },
  },
};

export interface NumberSchema {
  currency: {
    style: 'currency';
    currency: 'EUR';
    currencyDisplay: 'symbol';
  };
  percent: {
    style: 'percent';
    useGrouping: false;
    minimumFractionDigits: 2;
  };
}

const numberFormats = {
  'en-US': {
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
  },
  'fr-FR': {
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
  },
};

export const defaultConfig = {
  datetimeFormats: defaultDatetimeFormats,
  numberFormats: numberFormats,
  fallbackLocale: defaultFallbackLocale,
  globalInjection:
    true /* Check if necessary https://vue-i18n.intlify.dev/api/general.html#globalinjection */,
  legacy: false,
  locale: defaultLocale, //navigator.languages[0]
};
