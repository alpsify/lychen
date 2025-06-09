import type { Meta, StoryObj } from '@storybook/vue3';

import Calendar from '@lychen/vue-components-core/calendar/Calendar.vue';
import { getLocalTimeZone, today } from '@internationalized/date';

const meta: Meta<typeof Calendar> = {
  title: 'Core/Calendar',
  component: Calendar,
  tags: ['autodocs'],
  argTypes: {
    class: { control: 'text' },
    maxValue: { control: 'date', description: 'Maximum date' },
    minValue: { control: 'date', description: 'Minimum date' },
    initialFocus: { control: 'boolean' },
    locale: { control: 'inline-radio', options: ['fr-FR', 'en-CA'] },
  },
  args: {
    class: '',
    locale: 'fr-FR',
  },
} satisfies Meta<typeof Calendar>;

export default meta;
type Story = StoryObj<typeof Calendar>;

export const Default: Story = {
  args: {},
};

export const DateSelected: Story = {
  args: {
    modelValue: today(getLocalTimeZone()).add({ days: 3 }),
  },
};

export const MinDateToday: Story = {
  args: {
    minValue: today(getLocalTimeZone()),
  },
};

export const MaxDateToday: Story = {
  args: {
    maxValue: today(getLocalTimeZone()),
  },
};

export const WeekDayFormat: Story = {
  args: {
    weekdayFormat: 'short',
  },
};

export const UnavailableDate: Story = {
  args: {
    isDateUnavailable: (date) => {
      return date.day === 17 || date.day === 18;
    },
  },
};
