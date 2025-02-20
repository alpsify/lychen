<template>
  <PageHomeHero />
  <WebsiteSectionCrowfunding />
  <WebsiteSectionApplicationFeatures :features="features" />
  <!--<PageHomeUseCase />-->
</template>

<script lang="ts" setup>
import ogImageUrl from './assets/HomeOgImage.webp';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import WebsiteSectionCrowfunding from '@lychen/website-ui-components/sections/WebsiteSectionCrowfunding.vue';

import { messages, TRANSLATION_KEY } from './i18n';
import PageHomeHero from './PageHomeHero.vue';
import { useExtendedHead } from '@lychen/vue-unhead-util-composables/useExtendedHead';
import WebsiteSectionApplicationFeatures from '@lychen/website-ui-components/sections/application-features/WebsiteSectionApplicationFeatures.vue';
import { useFeatures } from '@lychen/tera-util-features/composables/useFeatures';
import { ref } from 'vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useExtendedHead(t, { ogImage: ogImageUrl });

const { getOrganizedFeatures } = useFeatures();
const features = ref();

features.value = getOrganizedFeatures();
</script>

<style lang="css" scoped></style>
