<template>
  <PageHomeHero />
  <PageHomeIntro id="discover" />
  <PageHomeEngage />
  <PageHomeMesh />
  <PageHomePeople />
  <LychenContainer wrapper-class="bg-gradient-to-b from-surface-container to-surface">
    <LychenTitle variant="h2">Gratuit. Fun. A ton rythme.</LychenTitle>
  </LychenContainer>
  <WebsiteSectionCrowfunding />
</template>

<script lang="ts" setup>
import ogImageUrl from './assets/HomeOgImage.webp';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import WebsiteSectionCrowfunding from '@lychen/website-ui-components/sections/WebsiteSectionCrowfunding.vue';

import { messages, TRANSLATION_KEY } from './i18n';
import PageHomeHero from './PageHomeHero.vue';
import { useExtendedHead } from '@lychen/vue-unhead-util-composables/useExtendedHead';
import LychenContainer from '@lychen/ui-components/container/LychenContainer.vue';
import LychenTitle from '@lychen/ui-components/title/LychenTitle.vue';
import PageHomeIntro from './PageHomeIntro.vue';
import PageHomeMesh from './PageHomeMesh.vue';
import PageHomeEngage from './PageHomeEngage.vue';
import PageHomePeople from './PageHomePeople.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useExtendedHead(t, { ogImage: ogImageUrl });
</script>

<style lang="css" scoped></style>
