<template>
  <PageHomeHero />
  <PageHomeIntro
    id="discover"
    class="pt-30"
  />
  <PageHomeEngage />
  <PageHomeMesh />
  <LychenContainer class="flex md:flex-row flex-col justify-start items-center">
    <div
      class="bg-tertiary-container text-on-tertiary-container rounded-3xl basis-1/2 p-8 flex flex-col gap-6"
    >
      <LychenTitle
        variant="h2"
        class="md:w-1/2"
        >Pour tout le monde.</LychenTitle
      >
      <LychenParagraph
        variant="website-highlight"
        class="md:w-1/2"
        >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt mauris,
        a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
        euismod.</LychenParagraph
      >
    </div>
    <div class="flex md:flex-row flex-col gap-8 basis-2/3">
      <div
        class="rounded-3xl p-6 bg-tertiary text-on-tertiary flex flex-col gap-6 justify-between min-h-[250px]"
      >
        <LychenTitle variant="h3">Citoyen·nes</LychenTitle>

        <LychenParagraph variant="website-highlight"
          >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt
          mauris, a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
          euismod.</LychenParagraph
        >
      </div>
      <div
        class="rounded-3xl p-6 bg-tertiary text-on-tertiary flex flex-col gap-6 justify-between min-h-[250px]"
      >
        <LychenTitle variant="h3">Associations</LychenTitle>
        <LychenParagraph variant="website-highlight"
          >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt
          mauris, a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
          euismod.</LychenParagraph
        >
      </div>
      <div
        class="rounded-3xl p-6 bg-tertiary text-on-tertiary flex flex-col gap-6 justify-between min-h-[250px]"
      >
        <LychenTitle variant="h3">Entreprises</LychenTitle>
        <LychenParagraph variant="website-highlight"
          >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt
          mauris, a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
          euismod.</LychenParagraph
        >
      </div>
      <div
        class="rounded-3xl p-6 bg-tertiary text-on-tertiary flex flex-col gap-6 justify-between min-h-[250px]"
      >
        <LychenTitle variant="h3">Collectivités</LychenTitle>
        <LychenParagraph variant="website-highlight"
          >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt
          mauris, a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
          euismod.</LychenParagraph
        >
      </div>
    </div>
  </LychenContainer>
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
import { useFeatures } from '@lychen/robust-util-features/composables/useFeatures';
import { ref } from 'vue';
import LychenContainer from '@lychen/ui-components/container/LychenContainer.vue';
import LychenTitle from '@lychen/ui-components/title/LychenTitle.vue';
import LychenParagraph from '@lychen/ui-components/paragraph/LychenParagraph.vue';
import LychenTextHighlight from '@lychen/ui-components/text-highlight/LychenTextHighlight.vue';
import PageHomeIntro from './PageHomeIntro.vue';
import PageHomeMesh from './PageHomeMesh.vue';
import PageHomeEngage from './PageHomeEngage.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useExtendedHead(t, { ogImage: ogImageUrl });

const { getOrganizedFeatures } = useFeatures();
const features = ref();

features.value = getOrganizedFeatures();
</script>

<style lang="css" scoped></style>
