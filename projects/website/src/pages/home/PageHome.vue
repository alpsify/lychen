<template>
  <PageHomeHero />
  <PageHomeCrowfunding />
  <PageHomeFeatures />
  <PageHomeOSS />
  <PageHomePresentation />
  <PageHomeActors />
</template>

<script lang="ts" setup>
import heroUrl from './assets/hero-1.webp';

import { useTranslations } from './i18n';
import PageHomeActors from './PageHomeActors.vue';
import PageHomeCrowfunding from './PageHomeCrowfunding.vue';
import PageHomeFeatures from './PageHomeFeatures.vue';
import PageHomeHero from './PageHomeHero.vue';
import PageHomePresentation from './PageHomePresentation.vue';
import PageHomeOSS from './PageHomeOSS.vue';
import { useExtendedHead } from '@/composables/useExtendedHead';

const { t } = useTranslations();

useExtendedHead(t, { ogImage: heroUrl });
</script>

<style lang="css" scoped></style>
