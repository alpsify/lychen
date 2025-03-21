import type { LandMemberJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import type { EventBusKey } from '@vueuse/core';

export const landMemberPostSucceededEvent: EventBusKey<LandMemberJsonld> = Symbol(
  'land-member-post-succeeded',
);
export const landMemberDeleteSucceededEvent: EventBusKey<LandMemberJsonld> = Symbol(
  'land-member-delete-succeeded',
);
export const landMemberPatchSucceededEvent: EventBusKey<LandMemberJsonld> = Symbol(
  'land-member-patch-succeeded',
);
