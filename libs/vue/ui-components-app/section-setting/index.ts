import { cva, type VariantProps } from 'class-variance-authority';

export const VARIANT = {
  Default: 'default',
  FullWidth: 'full-width',
} as const;

export { default as SectionSetting } from './SectionSetting.vue';

export const sectionSettingVariants = cva('gap-4', {
  variants: {
    variant: {
      [VARIANT.Default]: 'flex flex-col md:grid md:grid-cols-[30%_1fr]',
      [VARIANT.FullWidth]: 'flex flex-col',
    },
  },
  defaultVariants: {
    variant: VARIANT.Default,
  },
});

export type SectionSettingVariants = VariantProps<typeof sectionSettingVariants>;
