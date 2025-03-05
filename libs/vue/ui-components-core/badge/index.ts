import { cva, type VariantProps } from 'class-variance-authority';

export const badgeVariants = cva(
  'focus:ring-ring inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2',
  {
    variants: {
      variant: {
        primary: 'bg-primary text-on-primary',
        secondary: 'bg-secondary text-on-secondary',
        tertiary: 'bg-tertiary text-on-tertiary',
        negative: 'bg-negative text-negative-on',
        positive: 'bg-positive text-positive-on',
        outline: 'text-on-surface',
      },
    },
    defaultVariants: {
      variant: 'primary',
    },
  },
);

export type BadgeVariants = VariantProps<typeof badgeVariants>;

export { default as Badge } from './Badge.vue';
