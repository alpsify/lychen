<template>
  <PageHomeHero />
  <!--<SectionCrowdfunding />-->
  <PageHomeApplications />
  <PageHomeUseCases />
  <PageHomeBento />
  <PageHomeODD />
  <PageHomeOSS />
  <PageHomeActors />
</template>

<script lang="ts" setup>
import ogImageUrl from './assets/HomeOgImage.webp';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';

import { messages, TRANSLATION_KEY } from './i18n';
import PageHomeActors from './PageHomeActors.vue';
//import SectionCrowdfunding from '@lychen/vue-components-website/section-crowdfunding/SectionCrowdfunding.vue';
import PageHomeODD from './PageHomeODD.vue';
import PageHomeHero from './PageHomeHero.vue';
import PageHomeOSS from './PageHomeOSS.vue';
import PageHomeUseCases from './PageHomeUseCases.vue';
import PageHomeApplications from './PageHomeApplications.vue';
import PageHomeBento from './PageHomeBento.vue';
import { useExtendedHead } from '@lychen/vue-unhead-composables/useExtendedHead';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useExtendedHead(t, { ogImage: ogImageUrl });
</script>

<style lang="css" scoped></style>
