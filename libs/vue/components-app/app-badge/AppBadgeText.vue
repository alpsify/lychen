<template>
  <div class="app-badge-text flex flex-col">
    <slot>
      <span
        :class="
          cn('font-lexend font-bold text-lg transition-all duration-100 ease-in-out', nameClass)
        "
        >{{ name }}</span
      >
      <span
        v-if="!nameOnly"
        class="text-xs -mt-1"
        ><span class="opacity-50">{{ t('by') }}</span>
        <span class="font-bold opacity-70"> Lychen</span>
      </span>
    </slot>
  </div>
</template>

<script setup lang="ts">
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import { cn } from '@lychen/typescript-tailwind/Cn';
import type { HTMLAttributes } from 'vue';

const {
  name,
  nameOnly = false,
  nameClass,
} = defineProps<{
  name?: string;
  nameOnly?: boolean;
  nameClass?: HTMLAttributes['class'];
}>();

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
