import type { Meta, StoryObj } from '@storybook/vue3';

import CardTeraLandProposal from '@lychen/tera-ui-components/land-proposal/card/CardTeraLandProposal.vue';
import { CalendarDate, getLocalTimeZone, today } from '@internationalized/date';

const component = CardTeraLandProposal;

const meta: Meta<typeof component> = {
  title: 'Tera/Land Proposal/Card',
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
    title: 'Recherche un·e jardinier·ère non professionel·le',
    landCity: 'Annecy',
    landAltitude: 495,
    landName: 'Yupo Garden',
    landSurface: 450,
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
  name: 'Proposal close to expire',
  args: {
    title: 'Recherche un·e jardinier·ère non professionel·le',
    landCity: 'Annecy',
    landAltitude: 495,
    landName: 'Yupo Garden',
    landSurface: 450,
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
