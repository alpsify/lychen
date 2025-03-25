import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import type { EventBusKey } from '@vueuse/core';

export const landMemberPostSucceededEvent: EventBusKey<components['schemas']['LandMember.jsonld']> =
  Symbol('land-member-post-succeeded');
export const landMemberDeleteSucceededEvent: EventBusKey<
  components['schemas']['LandMember.jsonld']
> = Symbol('land-member-delete-succeeded');
export const landMemberPatchSucceededEvent: EventBusKey<
  components['schemas']['LandMember.jsonld']
> = Symbol('land-member-patch-succeeded');
export const landMemberLeaveSucceededEvent: EventBusKey<
  components['schemas']['LandMember.jsonld']
> = Symbol('land-member-leave-succeeded');
