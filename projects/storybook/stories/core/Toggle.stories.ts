import type { Meta, StoryObj } from '@storybook/vue3';

import Toggle from '@lychen/vue-ui-components-core/toggle/Toggle.vue';

const meta: Meta<typeof Toggle> = {
  title: 'Core/Toggle',
  component: Toggle,
  tags: ['autodocs'],
  argTypes: {
    class: { control: 'text' },
  },
  args: {},
} satisfies Meta<typeof Toggle>;

export default meta;
type Story = StoryObj<typeof Toggle>;

export const Default: Story = {
  args: {},
};

export const Outline: Story = {
  args: {
    variant: 'outline',
  },
};
