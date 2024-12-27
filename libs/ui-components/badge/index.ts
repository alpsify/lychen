import { cva, type VariantProps } from 'class-variance-authority';

export const badgeVariants = cva(
  'focus:ring-ring inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2',
  {
    variants: {
      variant: {
        primary: 'bg-primary text-primary-on',
        secondary: 'bg-secondary text-secondary-on',
        tertiary: 'bg-tertiary text-tertiary-on',
        negative: 'bg-negative text-negative-on',
        positive: 'bg-positive text-positive-on',
        outline: 'text-surface-on',
      },
    },
    defaultVariants: {
      variant: 'primary',
    },
  },
);

export type LychenBadgeVariants = VariantProps<typeof badgeVariants>;
