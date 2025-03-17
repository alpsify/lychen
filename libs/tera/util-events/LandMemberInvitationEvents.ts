import type { LandMemberInvitationJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import type { EventBusKey } from '@vueuse/core';

export const landMemberInvitationPostSucceededEvent: EventBusKey<LandMemberInvitationJsonld> =
  Symbol('land-member-invitation-post-succeeded');
export const landMemberInvitationDeleteSucceededEvent: EventBusKey<LandMemberInvitationJsonld> =
  Symbol('land-member-invitation-delete-succeeded');
export const landMemberInvitationPatchSucceededEvent: EventBusKey<LandMemberInvitationJsonld> =
  Symbol('land-member-invitation-patch-succeeded');
export const landMemberInvitationAcceptSucceededEvent: EventBusKey<LandMemberInvitationJsonld> =
  Symbol('land-member-invitation-accept-succeeded');
export const landMemberInvitationRefuseSucceededEvent: EventBusKey<LandMemberInvitationJsonld> =
  Symbol('land-member-invitation-refuse-succeeded');
