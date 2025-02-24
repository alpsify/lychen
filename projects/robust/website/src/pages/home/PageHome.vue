<template>
  <PageHomeHero />
  <PageHomeIntro />
  <LychenContainer
    wrapper-class="bg-gradient-to-b from-surface-container to-surface"
    class="flex flex-col items-center"
  >
    <div class="md:w-2/3 text-center flex flex-col gap-6">
      <LychenTitle variant="h2">S'engager et inspirer localement.</LychenTitle>
      <LychenParagraph variant="website-highlight"
        >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt mauris,
        a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
        euismod.</LychenParagraph
      >
      <div class="flex md:flex-row gap-8 flex-col">
        <div
          class="md:basis-1/3 p-8 rounded-2xl bg-gradient-to-tr from-primary to-primary-container text-on-primary outline-1 outline-offset-4 outline-primary-container/90 flex flex-col items-center justify-center"
        >
          <LychenTitle variant="h4">Votre ecosystème</LychenTitle>
          <p>La où vous vivez et la où votre impact est très important.</p>
        </div>
        <div
          class="md:basis-1/3 p-8 rounded-2xl bg-surface-container-high outline-1 outline-offset-4 outline-surface-container-high/50 flex flex-col items-center justify-center"
        >
          <LychenTitle variant="h4">Vos connections</LychenTitle>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt
            mauris, a volutpat sem. Etiam eget nisl sapien.
          </p>
        </div>
        <div
          class="md:basis-1/3 p-8 rounded-2xl bg-surface-container-high outline-1 outline-offset-4 outline-surface-container-high/50 flex flex-col items-center justify-center"
        >
          <LychenTitle variant="h4">Vos engagements</LychenTitle>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt
            mauris, a volutpat sem. Etiam eget nisl sapien.
          </p>
        </div>
      </div>
    </div>
  </LychenContainer>
  <LychenContainer>
    <div
      class="flex flex-row bg-secondary-container text-on-secondary-container rounded-3xl items-center p-20"
    >
      <div class="md:basis-1/2 flex flex-col gap-6">
        <LychenTitle variant="h2">Solidifier le maillage territorial.</LychenTitle>
        <LychenParagraph variant="website-highlight"
          >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt
          mauris, a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
          euismod.</LychenParagraph
        >
        <div class="flex flex-col gap-4">
          <div class="bg-secondary/90 p-4 rounded-xl text-on-secondary">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt
            mauris, a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
            euismod.
          </div>
          <div class="bg-secondary/70 p-4 rounded-xl text-on-secondary md:translate-x-2/10">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt
            mauris, a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
            euismod.
          </div>
          <div class="bg-secondary/50 p-4 rounded-xl text-on-secondary">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac tincidunt
            mauris, a volutpat sem. Etiam eget nisl sapien. Suspendisse cursus nibh vitae venenatis
            euismod.
          </div>
        </div>
      </div>
      <div>
        <img />
      </div>
    </div>
  </LychenContainer>
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

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

useExtendedHead(t, { ogImage: ogImageUrl });

const { getOrganizedFeatures } = useFeatures();
const features = ref();

features.value = getOrganizedFeatures();
</script>

<style lang="css" scoped></style>
