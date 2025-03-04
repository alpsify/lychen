<template>
  <Container class="flex flex-col gap-4 lg:w-1/2 md:py-20">
    <LychenTitle variant="h2">{{ t(`section.how_we_use_funds.title`) }}</LychenTitle>
    <LychenParagraph variant="website-highlight">{{
      t(`section.how_we_use_funds.description`)
    }}</LychenParagraph>
    <ul>
      <li
        v-for="(pointKey, index) in Object.keys(messages['fr-FR'].section.how_we_use_funds.points)"
        :key="index"
      >
        <LychenIcon
          icon="arrow-right"
          class="mr-2"
        />{{ t(`section.how_we_use_funds.points.${pointKey}.title`) }}
      </li>
    </ul>
  </Container>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const Container = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/container/Container.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
