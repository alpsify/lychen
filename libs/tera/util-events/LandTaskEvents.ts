import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import type { EventBusKey } from '@vueuse/core';

export const landTaskPostSucceededEvent: EventBusKey<components['schemas']['LandTask.jsonld']> =
  Symbol('land-task-post-succeeded');
export const landTaskDeleteSucceededEvent: EventBusKey<components['schemas']['LandTask.jsonld']> =
  Symbol('land-task-delete-succeeded');
export const landTaskPatchSucceededEvent: EventBusKey<components['schemas']['LandTask.jsonld']> =
  Symbol('land-task-patch-succeeded');
