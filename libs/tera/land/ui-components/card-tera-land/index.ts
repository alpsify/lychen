import type { ObjectValues } from '@lychen/typescript-util-object/Object';

export const VARIANT = {
  LookingForMember: 'looking_for_member',
  Default: 'default',
} as const;

export type Variant = ObjectValues<typeof VARIANT>;
