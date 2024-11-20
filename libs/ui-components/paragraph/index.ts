import { cva, type VariantProps } from 'class-variance-authority';

export interface Props {
  text: string;
}

export const paragraphVariants = cva('text-balance', {
  variants: {
    variant: {
      default: 'text-base leading-4',
      'website-default': 'text-base font-semibold leading-6 tracking-tight',
      'website-highlight': 'text-lg font-semibold leading-6 tracking-tight',
    },
  },
  defaultVariants: {
    variant: 'default',
  },
});

export type ParagraphVariants = VariantProps<typeof paragraphVariants>;
