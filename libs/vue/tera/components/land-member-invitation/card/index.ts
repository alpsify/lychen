import { type ObjectValues } from '@lychen/typescript-utils/transformers/ObjectValues';

export const VARIANT = {
  Settings: 'settings',
  ForUser: 'for-user',
} as const;

export type Variant = ObjectValues<typeof VARIANT>;
