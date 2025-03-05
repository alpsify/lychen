<template>
  <Container class="flex flex-col-reverse items-center gap-4 lg:flex-row">
    <div class="flex basis-1/2 flex-col gap-2">
      <Title variant="h2">{{ t('presentation.title') }}</Title>
      <Paragraph variant="website-default">{{ t('presentation.description') }}</Paragraph>
      <Paragraph
        variant="website-default"
        class="opacity-60"
        >{{ t('presentation.second_description') }}
      </Paragraph>
    </div>
    <div class="basis-1/2">
      <img
        :src="imageUrl"
        loading="lazy"
        alt="Eco-friendly residential complex with glass walls, rooftop gardens, and lush greenery connected by wooden paths."
        class="rounded-lg"
      />
    </div>
  </Container>
</template>

<script setup lang="ts">
import imageUrl from './assets/presentation.webp';
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const Container = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/container/Container.vue'),
);
const Title = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/title/Title.vue'),
);
const Paragraph = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/paragraph/Paragraph.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
