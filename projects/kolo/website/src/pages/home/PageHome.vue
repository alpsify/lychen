<template>
  <PageHomeHero />
  <SectionApplicationFeatures :features="features" />
</template>

<script lang="ts" setup>
import ogImageUrl from './assets/HomeOgImage.webp';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

import { messages, TRANSLATION_KEY } from './i18n';
import PageHomeHero from './PageHomeHero.vue';
import { useExtendedHead } from '@lychen/vue-unhead-util-composables/useExtendedHead';
import SectionApplicationFeatures from '@lychen/vue-ui-components-website/section-application-features/SectionApplicationFeatures.vue';
import { useFeatures } from '@lychen/kolo-util-features/composables/useFeatures';
import { ref } from 'vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useExtendedHead(t, { ogImage: ogImageUrl });

const { getOrganizedFeatures } = useFeatures();
const features = ref();

features.value = getOrganizedFeatures();
</script>

<style lang="css" scoped></style>
