<template>
  <LychenHero
    class="flex flex-col items-center justify-center gap-4 min-h-[30dvh] md:min-h-[60dvh] text-center"
  >
    <LychenTitle variant="h1">{{ t(`meta.title`) }}</LychenTitle>
    <LychenParagraph varaint="web">{{ t(`meta.description`) }}</LychenParagraph>
  </LychenHero>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { useTranslations } from './i18n';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const LychenHero = defineAsyncComponent(() => import('@lychen/ui-components/hero/LychenHero.vue'));

const { t } = useTranslations();
</script>
