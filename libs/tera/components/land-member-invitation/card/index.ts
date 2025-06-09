import type { ObjectValues } from '@lychen/typescript-object/Object';

export const VARIANT = {
  Settings: 'settings',
  ForUser: 'for-user',
} as const;

export type Variant = ObjectValues<typeof VARIANT>;
