import type { LandRoleJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import type { EventBusKey } from '@vueuse/core';

export const landRolePostSucceededEvent: EventBusKey<LandRoleJsonld> = Symbol(
  'land-role-post-succeeded',
);
export const landRoleDeleteSucceededEvent: EventBusKey<LandRoleJsonld> = Symbol(
  'land-role-delete-succeeded',
);
export const landRolePatchSucceededEvent: EventBusKey<LandRoleJsonld> = Symbol(
  'land-role-patch-succeeded',
);
