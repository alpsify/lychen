import type { Meta, StoryObj } from '@storybook/vue3';

import CardTeraLandRequest from '@lychen/tera-components/land-request/card/CardTeraLandRequest.vue';
import { getLocalTimeZone, today } from '@internationalized/date';

const component = CardTeraLandRequest;

const meta: Meta<typeof component> = {
  title: 'Tera/Land Request/Card',
  component: component,
  tags: ['autodocs'],
  argTypes: {
    class: { control: 'text' },
  },
  args: {
    class: 'w-full',
  },
} satisfies Meta<typeof component>;

export default meta;
type Story = StoryObj<typeof component>;

export const Default: Story = {
  args: {
    title: 'Recherche un espace de culture',
    expirationDate: today(getLocalTimeZone()).add({ days: 14 }).toString(),
    preferredInteractionMode: 'no_preference',
    sharingConditions: ['beehives', 'flower_planting', 'gardening'],
  },
};

export const CloseToExpire: Story = {
  parameters: {
    docs: {
      description: {
        story: '-3 days from expiration date',
      },
    },
  },
  name: 'Request close to expire',
  args: {
    title: 'Recherche un espace de culture',
    expirationDate: today(getLocalTimeZone()).add({ days: 3 }).toString(),
    preferredInteractionMode: 'no_preference',
    sharingConditions: [
      'beehives',
      'flower_planting',
      'gardening',
      'general_maintenance',
      'vegetable_sharing',
    ],
  },
};
