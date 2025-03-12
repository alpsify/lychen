<template>
  <div
    v-if="kind"
    class="flex flex-row items-center rounded-md px-2 uppercase py-1 text-xs gap-2 bg-secondary-container text-on-secondary-container"
  >
    {{ t(kind) }}
  </div>
</template>

<script lang="ts" setup>
import { LandJsonldKindEnum } from '@lychen/tera-util-api-sdk/generated/data-contracts';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
defineProps<{ kind?: LandJsonldKindEnum }>();
</script>
