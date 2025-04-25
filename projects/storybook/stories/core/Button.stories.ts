import type { Meta, StoryObj } from '@storybook/vue3';

import Button from '@lychen/vue-ui-components-core/button/Button.vue';
import { ICON_POSITION, SIZE, VARIANT } from '@lychen/vue-ui-components-core/button';
import { faRocket } from '@fortawesome/pro-light-svg-icons/faRocket';

const meta: Meta<typeof Button> = {
  title: 'Core/Button',
  component: Button,
  tags: ['autodocs'],
  argTypes: {
    size: { control: 'select', options: SIZE },
    variant: {
      control: 'select',
      options: VARIANT,
    },
    label: { control: 'text' },
    class: { control: 'text' },
    loading: { control: 'boolean' },
    iconPosition: { control: 'inline-radio', options: Object.keys(ICON_POSITION) },
    icon: { control: 'text' },
  },
  args: {
    label: 'Action label',
  },
} satisfies Meta<typeof Button>;

export default meta;
type Story = StoryObj<typeof Button>;

export const Default: Story = {
  args: {},
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

export const WithIcon: Story = {
  args: {
    icon: faRocket,
    iconPosition: ICON_POSITION.End,
  },
};

export const WithRightIcon: Story = {
  args: {
    icon: faRocket,
    iconPosition: ICON_POSITION.Start,
  },
};

export const IconOnly: Story = {
  args: {
    label: '',
    icon: faRocket,
  },
};

export const Loading: Story = {
  args: {
    loading: true,
    icon: faRocket,
  },
};
