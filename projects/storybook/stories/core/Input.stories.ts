import type { Meta, StoryObj } from '@storybook/vue3';

import Input from '@lychen/vue-components-core/input/Input.vue';

const meta: Meta<typeof Input> = {
  title: 'Core/Input',
  component: Input,
  tags: ['autodocs'],
  argTypes: {
    class: { control: 'text' },
  },
  args: {},
} satisfies Meta<typeof Input>;

export default meta;
type Story = StoryObj<typeof Input>;

export const Default: Story = {
  args: {},
};
