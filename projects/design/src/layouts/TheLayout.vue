<template>
  <main>
    <RouterView />
  </main>
</template>

<script lang="ts" setup>
import { TRANSLATION_KEY, messages } from '@lychen/tera-ui-i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
