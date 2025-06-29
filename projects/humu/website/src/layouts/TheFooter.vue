<template>
  <p class="text-sm opacity-80">
    {{ t(`footer.seo_paragraph`) }}
  </p>
</template>

<script lang="ts" setup>
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
