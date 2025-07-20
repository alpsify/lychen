import type { components } from '@lychen/typescript-tera-api-sdk/generated/tera-api';
import type { EventBusKey } from '@vueuse/core';

export const EVENT_landTaskPostSucceeded: EventBusKey<components['schemas']['LandTask.jsonld']> =
  Symbol();
export const EVENT_landTaskDeleteSucceeded: EventBusKey<components['schemas']['LandTask.jsonld']> =
  Symbol();
export const EVENT_landTaskPatchSucceeded: EventBusKey<components['schemas']['LandTask.jsonld']> =
  Symbol();
