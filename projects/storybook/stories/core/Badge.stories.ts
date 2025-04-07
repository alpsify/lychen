import type { Meta, StoryObj } from '@storybook/vue3';

import Badge from '@lychen/vue-ui-components-core/badge/Badge.vue';
import { VARIANT } from '@lychen/vue-ui-components-core/badge';

const meta: Meta<typeof Badge> = {
  title: 'Core/Badge',
  component: Badge,
  tags: ['autodocs'],
  argTypes: {
    variant: {
      control: 'select',
      options: VARIANT,
    },
    class: { control: 'text' },
  },
  args: {
    class: 'self-start',
  },
  render: (args) => ({
    components: { Badge },
    setup() {
      return { args };
    },
    template: '<Badge v-bind="args">Badge Text</Badge>',
  }),
} satisfies Meta<typeof Badge>;

export default meta;
type Story = StoryObj<typeof Badge>;

export const Default: Story = {
  args: {},
};

export const Secondary: Story = {
  args: {
    variant: 'secondary',
  },
};

export const Negative: Story = {
  args: {
    variant: 'negative',
  },
};

export const Positive: Story = {
  args: {
    variant: 'positive',
  },
};
