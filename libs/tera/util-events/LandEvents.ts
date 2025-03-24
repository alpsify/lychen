import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import type { EventBusKey } from '@vueuse/core';

export const landPostSucceededEvent: EventBusKey<components['schemas']['Land.jsonld']> =
  Symbol('land-post-succeeded');
export const landDeleteSucceededEvent: EventBusKey<components['schemas']['Land.jsonld']> =
  Symbol('land-delete-succeeded');
export const landPatchSucceededEvent: EventBusKey<components['schemas']['Land.jsonld']> =
  Symbol('land-patch-succeeded');
