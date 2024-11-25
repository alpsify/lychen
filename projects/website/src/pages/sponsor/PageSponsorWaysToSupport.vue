<template>
  <LychenContainer class="flex flex-col gap-4 md:w-1/2 md:py-20">
    <LychenTitle variant="h2">{{ t(`section.ways_to_support.title`) }}</LychenTitle>
    <LychenParagraph variant="website-highlight">{{
      t(`section.ways_to_support.description`)
    }}</LychenParagraph>
    <ul>
      <li
        v-for="(pointKey, index) in Object.keys(messages['fr-FR'].section.ways_to_support.options)"
        :key="index"
      >
        <LychenIcon
          icon="arrow-right"
          class="mr-2"
        />
        <p class="font-bold">{{ t(`section.ways_to_support.options.${pointKey}.title`) }}</p>
        <small class="opacity-80">{{
          t(`section.ways_to_support.options.${pointKey}.description`)
        }}</small>
      </li>
    </ul>
  </LychenContainer>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { useTranslations, messages } from './i18n';

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const { t } = useTranslations();
</script>
