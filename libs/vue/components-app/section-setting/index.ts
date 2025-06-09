export { default as SectionSetting } from './SectionSetting.vue';

export const VARIANT_VALUES = {
  default: 'flex flex-col md:grid md:grid-cols-[30%_1fr]',
  fullwidth: 'flex flex-col',
} as const;

export const VARIANT = Object.keys(VARIANT_VALUES);
export type VariantKey = keyof typeof VARIANT_VALUES;
