<template>
  <PagePriceHero />
  <PagePriceExplanation />
  <PagePricePreregister />
</template>

<script lang="ts" setup>
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import PagePriceHero from './PagePriceHero.vue';
import PagePriceExplanation from './PagePriceExplanation.vue';
import PagePricePreregister from './PagePricePreregister.vue';
import { useExtendedHead } from '@lychen/vue-unhead-util-composables/useExtendedHead';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useExtendedHead(t);
</script>

<style lang="css" scoped></style>
