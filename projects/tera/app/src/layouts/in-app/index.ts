import type { LandJsonld } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import type { InjectionKey, Ref } from 'vue';

export const INJECT_LAND_KEY = Symbol() as InjectionKey<Ref<LandJsonld | undefined>>;
