<template>
  <Container class="flex flex-col gap-4 lg:w-1/2 md:py-20">
    <Title variant="h2">{{ t(`section.ways_to_support.title`) }}</Title>
    <Paragraph variant="website-highlight">{{
      t(`section.ways_to_support.description`)
    }}</Paragraph>
    <ul>
      <li
        v-for="(pointKey, index) in Object.keys(messages['fr-FR'].section.ways_to_support.options)"
        :key="index"
      >
        <Icon
          icon="arrow-right"
          class="mr-2"
        />
        <p class="font-bold">{{ t(`section.ways_to_support.options.${pointKey}.title`) }}</p>
        <small class="opacity-80">{{
          t(`section.ways_to_support.options.${pointKey}.description`)
        }}</small>
      </li>
    </ul>
  </Container>
</template>

<script setup lang="ts">
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
