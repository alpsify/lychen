import type { Meta, StoryObj } from '@storybook/vue3';

import SectionSetting from '@lychen/vue-components-app/section-setting/SectionSetting.vue';
import { VARIANT } from '@lychen/vue-components-app/section-setting';
import { Skeleton } from '@lychen/vue-components-core/skeleton';

const component = SectionSetting;

const meta: Meta<typeof component> = {
  title: 'App/SectionSetting',
  component: component,
  tags: ['autodocs'],
  argTypes: {
    class: { control: 'text' },
    title: { control: 'text' },
    description: { control: 'text' },
    variant: {
      control: 'select',
      options: VARIANT,
    },
  },
  args: {
    class: 'w-full',
    title: 'Titre de la section',
    description: 'Description de la section',
  },
  render: (args) => ({
    components: { SectionSetting, Skeleton },
    setup() {
      return { args };
    },
    template: '<SectionSetting v-bind="args"><Skeleton class="w-full h-20"/></SectionSetting>',
  }),
} satisfies Meta<typeof component>;

export default meta;
type Story = StoryObj<typeof component>;

export const Default: Story = {
  args: {},
};

export const MultipleSections: Story = {
  args: {},
  render: (args) => ({
    components: { SectionSetting, Skeleton },
    setup() {
      return { args };
    },
    template:
      '<div class="flex flex-col w-full"><SectionSetting v-bind="args"><Skeleton class="w-full h-20"/></SectionSetting><SectionSetting v-bind="args"><Skeleton class="w-full h-20"/></SectionSetting></div>',
  }),
};

export const WithSubTitleElement: Story = {
  args: {},
  render: (args) => ({
    components: { SectionSetting, Skeleton },
    setup() {
      return { args };
    },
    template:
      '<SectionSetting v-bind="args"><Skeleton class="w-full h-20"/><template #subTitle>Sub Title</template></SectionSetting>',
  }),
};
