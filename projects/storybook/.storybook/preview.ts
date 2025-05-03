import { ModeDecorator } from './modeDecorator';
import type { Preview } from '@storybook/vue3';
import { setup } from '@storybook/vue3';
import { createI18n } from 'vue-i18n';
import { configDefault } from '@lychen/vue-i18n-util-configs/ConfigDefault';

import '@lychen/css-core/all.css';

const i18nConfig = configDefault();
const i18n = createI18n(i18nConfig);

const preview: Preview = {
  decorators: [ModeDecorator],
  parameters: {
    controls: {
      matchers: {
        color: /(background|color)$/i,
        date: /Date$/i,
      },
    },
    darkMode: {
      stylePreview: true,
    },
    backgrounds: {
      default: 'surface', // Set the default background
      values: [
        { name: 'surface', value: 'var(--color-surface)' }, // Use your CSS variables
        { name: 'surface-container-low', value: 'var(--color-surface-container-low)' },
        { name: 'surface-container', value: 'var(--color-surface-container)' },
        { name: 'surface-container-high', value: 'var(--color-surface-container-high)' },
        { name: 'surface-container-highest', value: 'var(--color-surface-container-highest)' },
        { name: 'on-surface', value: 'var(--color-on-surface)' },
        { name: 'on-surface-variant', value: 'var(--color-on-surface-variant)' },
        { name: 'white', value: '#fff' },
        { name: 'black', value: '#000' },
      ],
    },
    options: {},
  },
};

setup((app) => {
  app.use(i18n);
});

export default preview;
