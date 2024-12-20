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
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

import { messages, TRANSLATION_KEY } from './i18n';
import PageHomeActors from './PageHomeActors.vue';
import PageHomeCrowfunding from './PageHomeCrowfunding.vue';
import PageHomeODD from './PageHomeODD.vue';
import PageHomeHero from './PageHomeHero.vue';
import PageHomeOSS from './PageHomeOSS.vue';
import PageHomeApplications from './PageHomeApplications.vue';
import { useExtendedHead } from '@/composables/useExtendedHead';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useExtendedHead(t, { ogImage: ogImageUrl });
</script>

<style lang="css" scoped></style>
