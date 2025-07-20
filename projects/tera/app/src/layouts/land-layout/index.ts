import type { InjectionKey, Ref } from 'vue';

export const INJECTION_KEY_LAND: InjectionKey<
  Ref<Partial<{ ulid: string; '@id': string; name: string }> | undefined>
> = Symbol();

export const INJECTION_KEY_LAND_MEMBER: InjectionKey<
  Ref<Partial<{ ulid: string; permissions: string[] }> | undefined>
> = Symbol();

export { default as LandLayout } from './LandLayout.vue';
