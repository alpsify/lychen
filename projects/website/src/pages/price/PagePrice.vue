<template>
  <PagePriceHero />
</template>

<script lang="ts" setup>
import { useHead } from '@unhead/vue';

import { useTranslations } from './i18n';
import PagePriceHero from './PagePriceHero.vue';

const { t } = useTranslations();

useHead({
  title: t('meta.title'),
});
</script>

<style lang="css" scoped></style>
