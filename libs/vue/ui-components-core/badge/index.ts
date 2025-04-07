export const VARIANT_VALUES = {
  default: 'bg-surface-container text-on-surface-container',
  primary: 'bg-primary text-on-primary',
  secondary: 'bg-secondary text-on-secondary',
  tertiary: 'bg-tertiary text-on-tertiary',
  negative: 'bg-negative text-on-negative',
  positive: 'bg-positive text-on-positive',
  warning: 'bg-warning text-on-warning',
  outline: 'bg-surface text-on-surface border-1 border-on-surface/20',
} as const;

export const VARIANT = Object.keys(VARIANT_VALUES);
export type VariantKey = keyof typeof VARIANT_VALUES;

export { default as Badge } from './Badge.vue';
