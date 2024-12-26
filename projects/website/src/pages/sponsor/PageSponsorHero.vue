<template>
  <LychenDivScalingDown>
    <LychenHero
      class="dark:text-surface-on text-surface flex flex-col items-center justify-center gap-4 min-h-[30dvh] md:min-h-[60dvh] text-center bg-gradient-to-tr from-[#348F50] to-[#56B4D3] rounded-b-3xl pt-20"
    >
      <div class="flex flex-col basis-3/4 gap-4 items-center">
        <LychenTitle variant="h1">{{ t(`section.intro.title`) }}</LychenTitle>
        <LychenParagraph
          variant="website-highlight"
          class="flex md:w-4/5 items-center"
          >{{ t(`section.intro.description`) }}</LychenParagraph
        >
      </div>
    </LychenHero>
  </LychenDivScalingDown>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LychenHero = defineAsyncComponent(() => import('@lychen/ui-components/hero/LychenHero.vue'));

const LychenDivScalingDown = defineAsyncComponent(
  () => import('@lychen/ui-components/div/LychenDivScalingDown.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
