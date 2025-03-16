import type { LandJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import type { EventBusKey } from '@vueuse/core';

export const landPostSucceededEvent: EventBusKey<LandJsonld> = Symbol('land-post-succeeded');
export const landDeleteSucceededEvent: EventBusKey<LandJsonld> = Symbol('land-delete-succeeded');
