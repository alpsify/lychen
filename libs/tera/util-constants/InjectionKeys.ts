import type { InjectionKey, Ref } from 'vue';

export const INJECT_LAND_KEY = Symbol() as InjectionKey<
  Ref<Partial<{ ulid: string; '@id': string; name: string }> | undefined>
>;

export const INJECT_LAND_MEMBER_KEY = Symbol() as InjectionKey<
  Ref<Partial<{ ulid: string; permissions: string[] }> | undefined>
>;
