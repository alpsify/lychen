import { cva, type VariantProps } from 'class-variance-authority';

export const buttonVariants = cva(
  'ring-offset-background focus-visible:ring-ring inline-flex items-center justify-center whitespace-nowrap rounded-full text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50',
  {
    variants: {
      variant: {
        default: 'bg-primary text-primary-on hover:bg-primary/90',
        secondary: 'bg-secondary text-secondary-on hover:bg-secondary/80',
        ghost: 'hover:bg-surface-container-high hover:text-surface-container-high-on',
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
