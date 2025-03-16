import type { ObjectValues } from '@lychen/typescript-util-object/Object';
import { cva, type VariantProps } from 'class-variance-authority';

export const ICON_POSITION = {
  Start: 'start',
  End: 'End',
} as const;

export type IconPosition = ObjectValues<typeof ICON_POSITION>;

export const buttonVariants = cva(
  'cursor-pointer ring-offset-background focus-visible:ring-ring inline-flex items-center justify-center whitespace-nowrap rounded-xl hover:shadow-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 gap-2',
  {
    variants: {
      variant: {
        default: 'bg-primary text-on-primary hover:bg-primary/90',
        secondary: 'bg-secondary/80 text-on-secondary hover:bg-secondary',
        negative: 'bg-negative text-on-negative hover:bg-negative/90',
        positive: 'bg-positive text-on-positive hover:bg-positive/90',
        warning: 'bg-warning text-on-warning hover:bg-warning/90',
        ghost: 'hover:bg-surface-container-high hover:text-on-surface-container-high',
        'container-high':
          'bg-surface-container-high text-on-surface-container-high hover:bg-surface-container-highest hover:text-on-surface-container-highest',
      },
      size: {
        default: 'h-10 px-4 py-2',
        xs: 'h-7 px-2',
        sm: 'h-9 px-3',
        lg: 'h-11 px-8',
      },
    },
    defaultVariants: {
      variant: 'default',
      size: 'default',
    },
  },
);

export type ButtonVariants = VariantProps<typeof buttonVariants>;
