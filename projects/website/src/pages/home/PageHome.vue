<template>
  <PageHomeHero />
  <PageHomeDefinition />
  <PageHomeFeatures />
  <PageHomeOSS />
  <PageHomePresentation />
  <PageHomeActors />
</template>

<script lang="ts" setup>
import heroUrl from './assets/hero-1.webp';
import { useSeoMeta } from '@unhead/vue';

import { useTranslations } from './i18n';
import PageHomeActors from './PageHomeActors.vue';
import PageHomeDefinition from './PageHomeDefinition.vue';
import PageHomeFeatures from './PageHomeFeatures.vue';
import PageHomeHero from './PageHomeHero.vue';
import PageHomePresentation from './PageHomePresentation.vue';
import PageHomeOSS from './PageHomeOSS.vue';

const { t } = useTranslations();

useSeoMeta({
  title: t('tab.title'),
  description: t('meta.description'),
  ogDescription: t('meta.og_description'),
  ogTitle: t('meta.og_title'),
  ogImage: heroUrl,
  twitterCard: 'summary_large_image',
  twitterTitle: t('meta.og_title'),
  twitterDescription: t('meta.og_description'),
});
</script>

<style lang="css" scoped></style>
