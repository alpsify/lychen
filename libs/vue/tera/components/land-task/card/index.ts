import { type ObjectValues } from '@lychen/typescript-utils/transformers/ObjectValues';

export const VARIANT = {
  Default: 'default',
} as const;

export type Variant = ObjectValues<typeof VARIANT>;
