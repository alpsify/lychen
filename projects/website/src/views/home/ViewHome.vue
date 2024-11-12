<template>
  <ViewHomeHero />
  <ViewHomeDefinition />
  <ViewHomeFeatures />
  <ViewHomeOSS />
  <ViewHomePresentation />
  <ViewHomeActors />
</template>

<script lang="ts" setup>
import heroUrl from '../assets/hero-1.webp';
import { useHead, useSeoMeta } from '@unhead/vue';

import { useTranslations } from './i18n';
import ViewHomeActors from './ViewHomeActors.vue';
import ViewHomeDefinition from './ViewHomeDefinition.vue';
import ViewHomeFeatures from './ViewHomeFeatures.vue';
import ViewHomeHero from './ViewHomeHero.vue';
import ViewHomePresentation from './ViewHomePresentation.vue';
import ViewHomeOSS from './ViewHomeOSS.vue';

const { t } = useTranslations();

useHead({
  title: t('tab.title'),
});

useSeoMeta({
  title: t('meta.title'),
  description: t('meta.description'),
  ogDescription: t('meta.og_description'),
  ogTitle: t('meta.og_title'),
  ogImage: heroUrl,
  twitterCard: 'summary_large_image',
});
</script>

<style lang="css" scoped></style>
