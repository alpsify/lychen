const en = {
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
};

const fr = {
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
};

export const defaultDatetimeFormats = {
  'en-US': en,
  'en-GB': en,
  'fr-FR': fr,
};