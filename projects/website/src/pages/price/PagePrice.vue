<template>
  <PagePriceHero />
</template>

<script lang="ts" setup>
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import PagePriceHero from './PagePriceHero.vue';
import { useExtendedHead } from '@/composables/useExtendedHead';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useExtendedHead(t);
</script>

<style lang="css" scoped></style>
