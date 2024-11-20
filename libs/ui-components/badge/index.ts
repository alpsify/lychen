import { cva, type VariantProps } from 'class-variance-authority';

export const badgeVariants = cva(
  'focus:ring-ring inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2',
  {
    variants: {
      variant: {
        primary: 'bg-primary text-primary-on hover:bg-primary/80 border-transparent',
        secondary: 'bg-secondary text-secondary-on hover:bg-secondary/80 border-transparent',
        tertiary: 'bg-tertiary text-tertiary-on hover:bg-tertiary/80 border-transparent',
        negative: 'bg-negative text-negative-on hover:bg-negative/80 border-transparent',
        positive: 'bg-positive text-positive-on hover:bg-positive/80 border-transparent',
        outline: 'text-surface-on',
      },
    },
    defaultVariants: {
      variant: 'primary',
    },
  },
);

export type LychenBadgeVariants = VariantProps<typeof badgeVariants>;
