<template>
  <div
    class="p-6 rounded-3xl bg-surface-container-high text-on-surface-container flex flex-col gap-2 h-full justify-between items-stretch active:bg-surface-container-highest"
  >
    <div class="flex flex-row gap-2 items-center">
      <Badge
        v-if="variant === VARIANT.LookingForMember"
        class="self-start bg-tertiary-container text-on-tertiary-container"
        >{{ t(`property.kind.${land.kind}.default`) }}
      </Badge>
      <Icon
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
          >{{ t('property.surface.default', land.surface) }}</small
        >
        <small class="text-tertiary opacity-50">{{
          t('property.land_areas.default', land.numberOfArea)
        }}</small>
      </div>

      <Title variant="h3">{{ land.name }}</Title>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { VARIANT, type Variant } from '.';

const Title = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/title/Title.vue'),
);
const Icon = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/icon/Icon.vue'));
const Badge = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/badge/Badge.vue'));

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
