<template>
  <div class="flex flex-col gap-4">
    <LychenContainer
      v-for="(sectionKey, index) in Object.keys(messages['fr-FR'].section)"
      :key="index"
      class="md:py-10"
    >
      <div class="flex flex-col md:flex-row gap-2 md:gap-8">
        <div
          class="flex flex-col basis-1/4 gap-2 rounded-3xl bg-tertiary-container text-on-tertiary-container p-4 md:p-6"
        >
          <LychenTitle
            variant="h2"
            class="break-words"
            >{{ t(`section.${sectionKey}.title`) }}</LychenTitle
          >
          <LychenParagraph class="opacity-80">{{
            t(`section.${sectionKey}.description`)
          }}</LychenParagraph>
        </div>

        <div class="basis-3/4 flex flex-col gap-6 p-4 md:p-6">
          <div
            v-for="(subSectionKey, _index) in Object.keys(
              messages['fr-FR'].section[sectionKey].sub_section,
            )"
            :key="_index"
            class="flex flex-col gap-1"
          >
            <LychenTitle variant="h3">{{
              t(`section.${sectionKey}.sub_section.${subSectionKey}.title`)
            }}</LychenTitle>
            <LychenParagraph class="opacity-80">{{
              t(`section.${sectionKey}.sub_section.${subSectionKey}.description`)
            }}</LychenParagraph>
          </div>
        </div>
      </div>
    </LychenContainer>
  </div>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
