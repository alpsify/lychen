import { cva, type VariantProps } from 'class-variance-authority';

export const VARIANT = {
  Default: 'default',
  FullWidth: 'full-width',
} as const;

export { default as SectionSetting } from './SectionSetting.vue';

export const sectionSettingVariants = cva('gap-4', {
  variants: {
    variant: {
      [VARIANT.Default]: 'grid grid-cols-[30%_1fr]',
      [VARIANT.FullWidth]: 'glex flex-col',
    },
  },
  defaultVariants: {
    variant: VARIANT.Default,
  },
});

export type SectionSettingVariants = VariantProps<typeof sectionSettingVariants>;
