<template>
  <LychenHero
    class="flex flex-col items-center justify-center gap-4 min-h-[30dvh] md:min-h-[60dvh] text-center"
  >
    <div class="flex flex-col basis-3/4 gap-4 items-center">
      <LychenTitle variant="h1">{{ t(`meta.title`) }}</LychenTitle>
      <LychenParagraph variant="website-highlight">{{ t(`meta.description`) }}</LychenParagraph>
    </div>
  </LychenHero>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const LychenHero = defineAsyncComponent(() => import('@lychen/ui-components/hero/LychenHero.vue'));

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
