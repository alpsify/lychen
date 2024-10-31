<template>
  <LychenContainer class="flex flex-col items-center gap-4">
    <LychenTitle variant="h2">{{ t('features.title') }}</LychenTitle>
    <LychenParagraph
      variant="website-default"
      class="w-1/2 text-center"
      >{{ t('features.description') }}
    </LychenParagraph>
    <LychenBentoGrid class="lg:grid-rows-3 grid w-full auto-rows-[30rem] grid-cols-3 gap-4 mt-10">
      <LychenBentoGridCard
        v-for="(feature, index) in features"
        :key="index"
        v-bind="feature"
        :class="feature.class"
      />
    </LychenBentoGrid>
  </LychenContainer>
</template>

<script setup lang="ts">
import LychenParagraph from '@lychen/ui-components/paragraph/LychenParagraph.vue';
import { defineAsyncComponent } from 'vue';

import { features } from '.';
import { useTranslations } from './i18n';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);
const LychenBentoGrid = defineAsyncComponent(
  () => import('@lychen/ui-components/bento-grid/LychenBentoGrid.vue'),
);
const LychenBentoGridCard = defineAsyncComponent(
  () => import('@lychen/ui-components/bento-grid/LychenBentoGridCard.vue'),
);

const { t } = useTranslations();
</script>
