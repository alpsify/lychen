<template>
  <div
    class="p-4 rounded-3xl bg-surface-container-high text-on-surface-container flex flex-row gap-4 justify-between items-center active:bg-surface-container-highest"
  >
    <div class="flex flex-col gap-1">
      <span class="whitespace-nowrap overflow-hidden text-ellipsis text-sm"
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
  </div>
</template>

<script lang="ts" setup>
import { computed, defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { VARIANT, type Variant } from '.';

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const { variant = VARIANT.Default, landTask } = defineProps<{
  landTask: {
    title: string;
    content: string;
    dueDate?: string;
    startDate?: string;
  };
  variant?: Variant;
}>();

const { t, d } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const overdue = computed<boolean>(() => {
  if (!landTask.dueDate) return false;
  return new Date(landTask.dueDate) < new Date();
});
</script>
