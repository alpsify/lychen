<template>
  <SectionWithTitle>
    <SectionDevelopmentInProgress :title="t('title')" />
  </SectionWithTitle>
</template>

<script lang="ts" setup>
import SectionWithTitle from '@lychen/vue-components-app/section-with-title/SectionWithTitle.vue';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { messages, TRANSLATION_KEY } from './i18n';
import SectionDevelopmentInProgress from '@lychen/vue-components-app/section-development-in-progress/SectionDevelopmentInProgress.vue';

const { t } = useI18nExtended({
  messages,
  rootKey: TRANSLATION_KEY,
  prefixed: true,
});
</script>

<style lang="css" scoped></style>
