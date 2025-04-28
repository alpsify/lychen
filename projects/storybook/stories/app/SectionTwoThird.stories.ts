import type { Meta, StoryObj } from '@storybook/vue3';

import SectionTwoThird from '@lychen/vue-ui-components-app/section-two-third/SectionTwoThird.vue';

const component = SectionTwoThird;

const meta: Meta<typeof component> = {
  title: 'App/SectionTwoThird',
  component: component,
  tags: ['autodocs'],
  argTypes: {
    class: { control: 'text' },
    title: { control: 'text' },
  },
  args: {
    class: 'w-full',
    mainClass: 'bg-surface-container rounded-2xl p-4',
    title: 'Titre de la section/page',
  },
} satisfies Meta<typeof component>;

export default meta;
type Story = StoryObj<typeof component>;

export const Default: Story = {
  args: {},
};

export const ChangeSideBackgroundColor: Story = {
  args: {
    sideClass: 'bg-gradient-to-tr from-tertiary to-tertiary-container',
  },
};
