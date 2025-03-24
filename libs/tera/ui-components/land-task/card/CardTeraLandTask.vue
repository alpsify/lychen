<template>
  <div
    class="p-4 flex flex-row gap-4 justify-between items-center active:bg-surface-container-highest"
  >
    <div class="flex flex-col gap-1">
      <span class="whitespace-nowrap overflow-hidden text-ellipsis text-sm font-bold"
        >{{ landTask.title }}
      </span>
      <span
        v-if="landTask.startDate || landTask.dueDate"
        class="opacity-70 text-xs"
      >
        {{
          landTask.startDate && !landTask.dueDate
            ? 'Débute le'
            : !landTask.startDate && landTask.dueDate
              ? 'Dû le'
              : 'Du'
        }}
        <span v-if="landTask.startDate">{{ d(landTask.startDate, 'short') }}</span>
        {{ landTask.startDate && landTask.dueDate ? 'au' : '' }}
        <span
          v-if="landTask.dueDate"
          :class="{ 'text-negative': overdue }"
          >{{ d(landTask.dueDate, 'short') }}</span
        >
      </span>
    </div>
    <div v-if="!noState">
      <BadgeTeraLandTaskState :state="landTask.state" />
    </div>
  </div>
</template>

<script lang="ts" setup>
import { computed } from 'vue';

import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { VARIANT, type Variant } from '.';
import BadgeTeraLandTaskState from '../badges/state/BadgeTeraLandTaskState.vue';
import type { components } from '@lychen/tera-util-api-sdk/generated/tera-api';

const {
  variant = VARIANT.Default,
  landTask,
  noState = false,
} = defineProps<{
  landTask: components['schemas']['LandTask.jsonld'];
  noState?: boolean;
  variant?: Variant;
}>();

const { t, d } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const overdue = computed<boolean>(() => {
  if (!landTask.dueDate) return false;
  return new Date(landTask.dueDate) < new Date();
});
</script>
