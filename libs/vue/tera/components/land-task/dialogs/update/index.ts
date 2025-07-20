import type { components } from '@lychen/typescript-tera-api-sdk/generated/tera-api';
import type { InjectionKey, Ref } from 'vue';

export const INJECTKEY_DIALOG_LAND_TASK_UPDATE_LAND = Symbol() as InjectionKey<
  Ref<components['schemas']['Land.jsonld'] | undefined> | undefined
>;
