import type { Meta, StoryObj } from '@storybook/vue3';

import SectionDevelopmentInProgress from '@lychen/vue-components-app/section-development-in-progress/SectionDevelopmentInProgress.vue';

const component = SectionDevelopmentInProgress;

const meta: Meta<typeof component> = {
  title: 'App/SectionDevelopmentInProgress',
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
