import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';
import type { InjectionKey, Ref } from 'vue';

export const INJECT_LAND_KEY = Symbol() as InjectionKey<
  Ref<components['schemas']['Land.jsonld'] | undefined>
>;
