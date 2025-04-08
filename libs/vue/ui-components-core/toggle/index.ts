import { cva, type VariantProps } from 'class-variance-authority';

export { default as Toggle } from './Toggle.vue';

export const toggleVariants = cva(
  'cursor-pointer inline-flex items-center justify-center rounded-xl text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:bg-surface-container focus-visible:border-on-surface/70 focus-visible:text-on-surface-container disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-on-surface data-[state=on]:text-surface [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 gap-2',
  {
    variants: {
      variant: {
        default: 'bg-surface-container text-on-surface-container',
        outline:
          'border border-on-surface/40 bg-surface hover:bg-surface-container hover:border-on-surface/70 hover:text-on-surface-container',
      },
      size: {
        default: 'h-10 px-3 min-w-10',
        sm: 'h-9 px-2.5 min-w-9',
        lg: 'h-11 px-5 min-w-11',
      },
    },
    defaultVariants: {
      variant: 'default',
      size: 'default',
    },
  },
);

export type ToggleVariants = VariantProps<typeof toggleVariants>;
