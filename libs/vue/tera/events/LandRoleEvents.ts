import type { components } from '@lychen/typescript-tera-api-sdk/generated/tera-api';
import type { EventBusKey } from '@vueuse/core';

export const landRolePostSucceededEvent: EventBusKey<components['schemas']['LandRole.jsonld']> =
  Symbol('land-role-post-succeeded');
export const landRoleDeleteSucceededEvent: EventBusKey<components['schemas']['LandRole.jsonld']> =
  Symbol('land-role-delete-succeeded');
export const landRolePatchSucceededEvent: EventBusKey<components['schemas']['LandRole.jsonld']> =
  Symbol('land-role-patch-succeeded');
