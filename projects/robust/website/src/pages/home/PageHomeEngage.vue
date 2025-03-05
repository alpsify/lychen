<template>
  <Container
    wrapper-class="bg-gradient-to-b from-surface-container to-surface"
    class="flex flex-col"
  >
    <div class="text-center flex flex-col gap-8 items-center">
      <Title
        variant="h2"
        class="md:w-2/3"
        >{{ t('engage.main_title') }}</Title
      >
      <Paragraph
        variant="website-highlight"
        class="md:w-2/3"
        >{{ t('engage.highlight_text') }}</Paragraph
      >
      <div class="flex md:flex-row gap-8 flex-col">
        <div
          class="md:basis-1/3 p-8 rounded-2xl bg-gradient-to-tr from-primary to-primary/60 shadow-2xl shadow-primary/50 dark:shadow-primary-container/50 text-on-primary outline-1 outline-offset-4 outline-primary-container/90 flex flex-col items-center justify-center gap-4"
        >
          <Title variant="h4">{{ t('engage.ecosystem.title') }}</Title>
          <p>
            {{ t('engage.ecosystem.text') }}
          </p>
        </div>
        <div
          class="md:basis-1/3 p-8 rounded-2xl bg-surface-container-high outline-1 outline-offset-4 outline-surface-container-high/50 flex flex-col items-center justify-center gap-4"
        >
          <Title variant="h4">{{ t('engage.connections.title') }}</Title>
          <p>
            {{ t('engage.connections.text') }}
          </p>
        </div>
        <div
          class="md:basis-1/3 p-8 rounded-2xl bg-surface-container-high outline-1 outline-offset-4 outline-surface-container-high/50 flex flex-col items-center justify-center gap-4"
        >
          <Title variant="h4">{{ t('engage.commitments.title') }}</Title>
          <p>
            {{ t('engage.commitments.text') }}
          </p>
        </div>
      </div>
    </div>
  </Container>
</template>

<script setup lang="ts">
import { messages, TRANSLATION_KEY } from './i18n';
import Container from '@lychen/vue-ui-components-website/container/Container.vue';
import Title from '@lychen/vue-ui-components-website/title/Title.vue';
import Paragraph from '@lychen/vue-ui-components-website/paragraph/Paragraph.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
