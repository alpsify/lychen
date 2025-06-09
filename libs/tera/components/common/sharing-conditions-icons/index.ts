export const DISPLAY = {
  Horizontal: 'horizontal',
  Vertical: 'vertical',
} as const;

export type Display = (typeof DISPLAY)[keyof typeof DISPLAY];
