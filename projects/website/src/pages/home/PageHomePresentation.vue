<template>
  <LychenContainer class="flex flex-col-reverse items-center gap-4 lg:flex-row">
    <div class="flex basis-1/2 flex-col gap-2">
      <LychenTitle variant="h2">{{ t('presentation.title') }}</LychenTitle>
      <LychenParagraph variant="website-default">{{
        t('presentation.description')
      }}</LychenParagraph>
      <LychenParagraph
        variant="website-default"
        class="opacity-60"
        >{{ t('presentation.second_description') }}
      </LychenParagraph>
    </div>
    <div class="basis-1/2">
      <img
        :src="imageUrl"
        loading="lazy"
        alt="Eco-friendly residential complex with glass walls, rooftop gardens, and lush greenery connected by wooden paths."
        class="rounded-lg"
      />
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import imageUrl from './assets/presentation.webp';
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);
const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);
const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
