<template>
  <PageHomeHero />
  <SectionCrowfunding />
</template>

<script lang="ts" setup>
import ogImageUrl from './assets/HomeOgImage.webp';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import SectionCrowfunding from '@lychen/website-ui-components/section/SectionCrowfunding.vue';

import { messages, TRANSLATION_KEY } from './i18n';
import PageHomeHero from './PageHomeHero.vue';
import { useExtendedHead } from '@lychen/vue-unhead-util-composables/useExtendedHead';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useExtendedHead(t, { ogImage: ogImageUrl });
</script>

<style lang="css" scoped></style>
