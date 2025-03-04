<template>
  <DivScalingDown>
    <Hero
      class="dark:text-on-surface text-surface flex flex-col items-center justify-center gap-4 min-h-[30dvh] md:min-h-[60dvh] text-center bg-gradient-to-tr from-[#141E30] to-[#243B55] rounded-b-3xl pt-20"
    >
      <div class="flex flex-col basis-3/4 gap-4 items-center">
        <LychenTitle variant="h1">{{ t(`meta.title`) }}</LychenTitle>
        <LychenParagraph variant="website-highlight">{{ t(`meta.description`) }}</LychenParagraph>
      </div>
    </Hero>
  </DivScalingDown>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const DivScalingDown = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-extra/div-scaling-down/DivScalingDown.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const Hero = defineAsyncComponent(() => import('@lychen/vue-ui-components-website/hero/Hero.vue'));

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
