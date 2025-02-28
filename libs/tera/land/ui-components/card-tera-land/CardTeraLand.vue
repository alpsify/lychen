<template>
  <div
    class="p-6 rounded-3xl bg-surface-container-high text-on-surface-container flex flex-col gap-2 h-full justify-between items-stretch active:bg-surface-container-highest"
  >
    <div class="flex flex-row gap-2 items-center">
      <LychenBadge
        v-if="variant === VARIANT.LookingForMember"
        class="self-start bg-tertiary-container text-on-tertiary-container"
        >{{ t(`kind.${land.kind}.default`) }}
      </LychenBadge>
      <LychenIcon
        v-if="variant === VARIANT.Default"
        :icon="land.numberOfMembers === 1 ? 'user' : 'users'"
      />
    </div>
    <div class="flex flex-col gap-1">
      <div
        v-if="variant === VARIANT.LookingForMember"
        class="flex flex-row gap-1 items-center"
      >
        <small
          v-if="land.surface"
          class="text-tertiary"
          >{{ t('surface.default', land.surface) }}</small
        >
        <small class="text-tertiary opacity-50">{{
          t('land_areas.default', land.numberOfArea)
        }}</small>
      </div>

      <LychenTitle variant="h3">{{ land.name }}</LychenTitle>
    </div>
  </div>
</template>

<script generic="T extends Land" lang="ts" setup>
import type { Land } from '@lychen/tera-util-api-sdk/model/Land';
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from '@lychen/tera-land-ui-i18n/property';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { VARIANT, type Variant } from '.';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);
const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));
const LychenBadge = defineAsyncComponent(
  () => import('@lychen/ui-components/badge/LychenBadge.vue'),
);

const { variant = VARIANT.Default, land } = defineProps<{
  land: {
    kind: string;
    name: string;
    surface: number;
    numberOfArea: number;
    numberOfMembers: number;
  };
  variant?: Variant;
}>();

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
