import type { components } from '@lychen/typescript-tera-api-sdk/generated/tera-api';
import type { EventBusKey } from '@vueuse/core';

export const landMemberInvitationPostSucceededEvent: EventBusKey<
  components['schemas']['LandMemberInvitation.jsonld']
> = Symbol('land-member-invitation-post-succeeded');
export const landMemberInvitationDeleteSucceededEvent: EventBusKey<null> = Symbol(
  'land-member-invitation-delete-succeeded',
);
export const landMemberInvitationPatchSucceededEvent: EventBusKey<
  components['schemas']['LandMemberInvitation.jsonld']
> = Symbol('land-member-invitation-patch-succeeded');
export const landMemberInvitationAcceptSucceededEvent: EventBusKey<
  components['schemas']['LandMemberInvitation.jsonld']
> = Symbol('land-member-invitation-accept-succeeded');
export const landMemberInvitationRefuseSucceededEvent: EventBusKey<
  components['schemas']['LandMemberInvitation.jsonld']
> = Symbol('land-member-invitation-refuse-succeeded');
