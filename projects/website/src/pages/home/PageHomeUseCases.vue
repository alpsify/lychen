<template>
  <Container class="flex flex-col items-center gap-4">
    <LychenTitle
      variant="h2"
      class="text-center md:w-2/3"
      >{{ t('use_cases.title') }}</LychenTitle
    >
    <LychenParagraph
      variant="website-highlight"
      class="text-center opacity-80 md:w-2/3"
    >
      {{ t('use_cases.description') }}
    </LychenParagraph>
    <LychenGlobal />
  </Container>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LychenGlobal = defineAsyncComponent(() => import('@lychen/diagrams/LychenGlobal.vue'));

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const Container = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/container/Container.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
