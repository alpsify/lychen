<template>
  <Page
    :title="t('title')"
    :description="t('description')"
  >
  </Page>
</template>

<script lang="ts" setup>
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

import { messages, TRANSLATION_KEY } from './i18n';
import { defineAsyncComponent } from 'vue';

const Page = defineAsyncComponent(() => import('@components/Page.vue'));

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
