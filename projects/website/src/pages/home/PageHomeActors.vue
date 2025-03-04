<template>
  <Container class="flex flex-col gap-10">
    <div class="flex flex-col items-center justify-between gap-4 lg:flex-row lg:justify-center">
      <LychenTitle
        variant="h2"
        class="basis-2/3"
      >
        {{ t('actors.title') }}
      </LychenTitle>
      <LychenParagraph
        variant="website-default"
        class="basis-1/3"
      >
        {{ t('actors.description') }}
      </LychenParagraph>
    </div>
    <div class="flex flex-col gap-4 lg:grid lg:grid-cols-3">
      <LychenCard
        v-for="(actor, index) in actors"
        :key="index"
        class="flex flex-col items-stretch justify-start p-4"
      >
        <LychenTitle variant="h3">{{ t(`actors.${actor}.title`) }}</LychenTitle>
        <div class="opacity-70">{{ t(`actors.${actor}.text`) }}</div>
      </LychenCard>
    </div>
  </Container>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);
const Container = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/container/Container.vue'),
);
const LychenCard = defineAsyncComponent(() => import('@lychen/ui-components/card/LychenCard.vue'));
const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const actors = [
  'localAuthorities',
  'citizens',
  'companies',
  'associations',
  'farmers',
  'researchers',
];
</script>
