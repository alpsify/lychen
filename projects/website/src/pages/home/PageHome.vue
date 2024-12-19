<template>
  <PageHomeHero />
  <PageHomeCrowfunding />
  <PageHomeFeatures />
  <PageHomeOSS />
  <PageHomePresentation />
  <PageHomeActors />
</template>

<script lang="ts" setup>
import ogImageUrl from './assets/Home-ogImage.webp';

import { useTranslations } from './i18n';
import PageHomeActors from './PageHomeActors.vue';
import PageHomeCrowfunding from './PageHomeCrowfunding.vue';
import PageHomeFeatures from './PageHomeFeatures.vue';
import PageHomeHero from './PageHomeHero.vue';
import PageHomePresentation from './PageHomePresentation.vue';
import PageHomeOSS from './PageHomeOSS.vue';
import { useExtendedHead } from '@/composables/useExtendedHead';

const { t } = useTranslations();

useExtendedHead(t, { ogImage: ogImageUrl });
</script>

<style lang="css" scoped></style>
