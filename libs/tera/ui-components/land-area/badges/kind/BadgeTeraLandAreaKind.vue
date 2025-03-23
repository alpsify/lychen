<template>
  <div
    v-if="kind"
    class="flex flex-row items-center rounded-md px-2 uppercase py-1 text-xs gap-2 bg-secondary-container text-on-secondary-container"
  >
    {{ t(`property.kind.${kind}.default`) }}
  </div>
</template>

<script lang="ts" setup>
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from '@lychen/tera-ui-i18n/land-area';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
defineProps<{ kind?: string }>();
</script>
