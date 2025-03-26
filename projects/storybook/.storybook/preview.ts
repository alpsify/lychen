import { ModeDecorator } from './modeDecorator';
import type { Preview } from '@storybook/vue3';

import '@lychen/ui-css/all.css';

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
  },
};

export default preview;
