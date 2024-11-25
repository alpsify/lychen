<template>
  <PageSponsorHero />
  <PageSponsorNeeds />
  <PageSponsorHowWeUseFunds />
  <PageSponsorWaysToSupport />
</template>

<script lang="ts" setup>
import { useTranslations } from './i18n';
import { useExtendedHead } from '@/composables/useExtendedHead';
import { defineAsyncComponent } from 'vue';

const PageSponsorNeeds = defineAsyncComponent(() => import('./PageSponsorNeeds.vue'));

const PageSponsorWaysToSupport = defineAsyncComponent(
  () => import('./PageSponsorWaysToSupport.vue'),
);
const PageSponsorHowWeUseFunds = defineAsyncComponent(
  () => import('./PageSponsorHowWeUseFunds.vue'),
);

const PageSponsorHero = defineAsyncComponent(() => import('./PageSponsorHero.vue'));

const { t } = useTranslations();

useExtendedHead(t);
</script>

<style lang="css" scoped></style>
