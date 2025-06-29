<template>
  <FooterMain
    :legal-menus
    :seo-paragraph="t('footer.seo_paragraph')"
    display-pronunciation
  />
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';

const FooterMain = defineAsyncComponent(
  () => import('@lychen/vue-components-website/footer/FooterMain.vue'),
);

const legalMenus = [
  { title: "Conditions générales d'utilisation" },
  { title: 'Protection des données' },
  { title: 'Mentions légales' },
];

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
