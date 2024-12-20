<template>
  <PageHomeHero />
  <PageHomeCrowfunding />
  <PageHomeApplications />
  <PageHomeODD />
  <PageHomeOSS />

  <PageHomeActors />
</template>

<script lang="ts" setup>
import ogImageUrl from './assets/Home-ogImage.webp';

import { useTranslations } from './i18n';
import PageHomeActors from './PageHomeActors.vue';
import PageHomeCrowfunding from './PageHomeCrowfunding.vue';
import PageHomeODD from './PageHomeODD.vue';
import PageHomeHero from './PageHomeHero.vue';
import PageHomeOSS from './PageHomeOSS.vue';
import PageHomeApplications from './PageHomeApplications.vue';
import { useExtendedHead } from '@/composables/useExtendedHead';

const { t } = useTranslations();

useExtendedHead(t, { ogImage: ogImageUrl });
</script>

<style lang="css" scoped></style>
