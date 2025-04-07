import { cva, type VariantProps } from 'class-variance-authority';

export const badgeVariants = cva(
  'flex flex-row items-center justify-center rounded-md px-2 py-1 text-xs gap-2 cursor-default',
  {
    variants: {
      variant: {
        default: '',
        primary: 'bg-primary text-on-primary',
        secondary: 'bg-secondary text-on-secondary',
        tertiary: 'bg-tertiary text-on-tertiary',
        negative: 'bg-negative text-on-negative',
        positive: 'bg-positive text-on-positive',
        warning: 'bg-warning text-on-warning',
        outline: 'text-on-surface border-1 border-on-surface/20',
      },
    },
    defaultVariants: {
      variant: 'default',
    },
  },
);

export type BadgeVariants = VariantProps<typeof badgeVariants>;

export { default as Badge } from './Badge.vue';
