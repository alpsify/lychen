import type { ObjectValues } from '@lychen/typescript-util-object/Object';

export const VARIANT = {
  Default: 'default',
  LookingForMember: 'looking_for_member',
} as const;

export type Variant = ObjectValues<typeof VARIANT>;
