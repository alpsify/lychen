import type { ObjectValues } from '@lychen/typescript-object/Object';

export const VARIANT = {
  Default: 'default',
} as const;

export type Variant = ObjectValues<typeof VARIANT>;
