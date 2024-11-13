<template>
  <ViewPriceHero />
</template>

<script lang="ts" setup>
import { useHead } from '@unhead/vue';

import { useTranslations } from './i18n';
import ViewPriceHero from './ViewPriceHero.vue';

const { t } = useTranslations();

useHead({
  title: t('meta.title'),
});
</script>

<style lang="css" scoped></style>
