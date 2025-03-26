import { fn } from '@storybook/test';
import type { Meta, StoryObj } from '@storybook/vue3';

import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { buttonVariants, ICON_POSITION } from '@lychen/vue-ui-components-core/button';

// More on how to set up stories at: https://storybook.js.org/docs/writing-stories
const meta = {
  title: 'Core/Button',
  component: Button,
  // This component will have an automatically generated docsPage entry: https://storybook.js.org/docs/writing-docs/autodocs
  tags: ['autodocs'],
  argTypes: {
    size: { control: 'select', options: ['xs', 'sm', 'lg'] },
    variant: {
      control: 'select',
      //options: Object.keys(buttonVariants.variants),
      options: ['secondary', 'negative', 'positive', 'warning', 'ghost', 'container-high'],
    },
    text: { control: 'text' },
    class: { control: 'text' },
    loading: { control: 'boolean' },
    iconPosition: { control: 'inline-radio', options: Object.keys(ICON_POSITION) },
    icon: { control: 'text' },
  },
  args: {
    text: 'Click me',
  },
} satisfies Meta<typeof Button>;

export default meta;
type Story = StoryObj<typeof meta>;
/*
 *👇 Render functions are a framework specific feature to allow you control on how the component renders.
 * See https://storybook.js.org/docs/api/csf
 * to learn how to use render functions.
 */
export const Default: Story = {
  args: {},
};

export const Secondary: Story = {
  args: {
    variant: 'secondary',
  },
};

export const ContainerHigh: Story = {
  args: {
    variant: 'container-high',
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
