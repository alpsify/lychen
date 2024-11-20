<template>
  <PagePriceHero />
</template>

<script lang="ts" setup>
import { useTranslations } from './i18n';
import PagePriceHero from './PagePriceHero.vue';
import { useExtendedHead } from '@/composables/useExtendedHead';

const { t } = useTranslations();

useExtendedHead(t);
</script>

<style lang="css" scoped></style>
