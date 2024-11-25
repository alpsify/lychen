<template>
  <LychenHero
    class="flex flex-col items-center justify-center gap-4 min-h-[30dvh] md:min-h-[60dvh] text-center bg-gradient-to-tr from-[#348F50] to-[#56B4D3] rounded-b-3xl pt-20"
  >
    <LychenTitle variant="h1">{{ t(`section.intro.title`) }}</LychenTitle>
    <LychenParagraph
      variant="website-highlight"
      class="flex md:w-4/5 items-center"
      >{{ t(`section.intro.description`) }}</LychenParagraph
    >
  </LychenHero>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { useTranslations } from './i18n';
import LychenHero from '@lychen/ui-components/hero/LychenHero.vue';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const { t } = useTranslations();
</script>
