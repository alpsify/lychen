<template>
  <Container class="flex flex-col gap-10">
    <div class="flex flex-col items-center justify-between gap-4 lg:flex-row lg:justify-center">
      <Title
        variant="h2"
        class="basis-2/3"
      >
        {{ t('actors.title') }}
      </Title>
      <Paragraph
        variant="website-default"
        class="basis-1/3"
      >
        {{ t('actors.description') }}
      </Paragraph>
    </div>
    <div class="flex flex-col gap-4 lg:grid lg:grid-cols-3">
      <Card
        v-for="(actor, index) in actors"
        :key="index"
        class="flex flex-col items-stretch justify-start p-4"
      >
        <Title variant="h3">{{ t(`actors.${actor}.title`) }}</Title>
        <div class="opacity-70">{{ t(`actors.${actor}.text`) }}</div>
      </Card>
    </div>
  </Container>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const Title = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/title/Title.vue'),
);
const Container = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/container/Container.vue'),
);
const Card = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/card/Card.vue'));
const Paragraph = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/paragraph/Paragraph.vue'),
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
