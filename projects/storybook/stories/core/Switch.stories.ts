import type { Meta, StoryObj } from '@storybook/vue3';

import Switch from '@lychen/vue-ui-components-core/switch/Switch.vue';

const meta: Meta<typeof Switch> = {
  title: 'Core/Switch',
  component: Switch,
  tags: ['autodocs'],
  argTypes: {
    class: { control: 'text' },
  },
  args: {},
} satisfies Meta<typeof Switch>;

export default meta;
type Story = StoryObj<typeof Switch>;

export const Default: Story = {
  args: {},
};
