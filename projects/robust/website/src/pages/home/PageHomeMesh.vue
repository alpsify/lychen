<template>
  <LychenContainer>
    <div
      class="flex flex-col-reverse xl:flex-row bg-secondary-container text-on-secondary-container rounded-3xl items-stretch outline outline-offset-4 outline-secondary-container"
    >
      <div class="md:basis-1/2 flex flex-col gap-6 md:p-20 p-8">
        <LychenTitle variant="h2">{{ t('mesh.title') }}</LychenTitle>
        <LychenParagraph variant="website-highlight">{{
          t('mesh.highlight_text')
        }}</LychenParagraph>
        <div class="flex flex-col gap-4">
          <div class="bg-secondary/90 p-4 rounded-xl text-on-secondary">
            {{ t('mesh.text_block_1') }}
          </div>
          <div class="bg-secondary/70 p-4 rounded-xl text-on-secondary xl:translate-x-1/10">
            {{ t('mesh.text_block_2') }}
          </div>
          <div class="bg-secondary/50 p-4 rounded-xl text-on-secondary">
            {{ t('mesh.text_block_3') }}
          </div>
        </div>
      </div>
      <div
        class="h-[300px] xl:h-auto xl:basis-1/2 flex flex-col items-center justify-center bg-cover xl:rounded-br-3xl rounded-tr-3xl rounded-tl-3xl xl:rounded-tl-none"
        :style="`background-image: url('${ImageUrl}');`"
      ></div>
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import ImageUrl from './assets/Collaborate.jpg';
import { messages, TRANSLATION_KEY } from './i18n';
import LychenContainer from '@lychen/ui-components/container/LychenContainer.vue';
import LychenTitle from '@lychen/ui-components/title/LychenTitle.vue';
import LychenParagraph from '@lychen/ui-components/paragraph/LychenParagraph.vue';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
