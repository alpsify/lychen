import type { Meta, StoryObj } from '@storybook/vue3';

import Skeleton from '@lychen/vue-ui-components-core/skeleton/Skeleton.vue';

const component = Skeleton;
const meta: Meta<typeof component> = {
  title: 'Core/Skeleton',
  component,
  tags: ['autodocs'],
  argTypes: {
    class: { control: 'text' },
  },
  args: {
    class: 'w-full h-20',
  },
} satisfies Meta<typeof component>;

export default meta;
type Story = StoryObj<typeof component>;

export const Default: Story = {
  args: {},
};
