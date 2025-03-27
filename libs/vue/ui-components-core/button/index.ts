import type { ObjectValues } from '@lychen/typescript-util-object/Object';

export const ICON_POSITION = {
  Start: 'start',
  End: 'End',
} as const;

export type IconPosition = ObjectValues<typeof ICON_POSITION>;

export const VARIANT_VALUES = {
  default: 'bg-primary text-on-primary hover:bg-primary/90',
  secondary: 'bg-secondary/80 text-on-secondary hover:bg-secondary',
  negative: 'bg-negative text-on-negative hover:bg-negative/90',
  positive: 'bg-positive text-on-positive hover:bg-positive/90',
  warning: 'bg-warning text-on-warning hover:bg-warning/90',
  ghost: 'hover:bg-surface-container-high hover:text-on-surface-container-high',
  'container-high':
    'bg-surface-container-high text-on-surface-container-high hover:bg-surface-container-highest hover:text-on-surface-container-highest',
} as const;

export const VARIANT = Object.keys(VARIANT_VALUES);
export type VariantKey = keyof typeof VARIANT_VALUES;

export const SIZE_VALUES = {
  default: 'h-10 px-4 py-2',
  xs: 'h-7 px-2',
  sm: 'h-9 px-3',
  lg: 'h-11 px-8',
} as const;

export const SIZE = Object.keys(SIZE_VALUES);
export type SizeKey = keyof typeof SIZE_VALUES;
