import type { Meta, StoryObj } from '@storybook/vue3';

import BadgeDevelopmentInProgress from '@lychen/vue-components-app/badge-development-in-progress/BadgeDevelopmentInProgress.vue';

const component = BadgeDevelopmentInProgress;

const meta: Meta<typeof component> = {
  title: 'App/BadgeDevelopmentInProgress',
  component: component,
  tags: ['autodocs'],
  argTypes: {
    class: { control: 'text' },
  },
  args: {},
} satisfies Meta<typeof component>;

export default meta;
type Story = StoryObj<typeof component>;

export const Default: Story = {
  args: {},
};
