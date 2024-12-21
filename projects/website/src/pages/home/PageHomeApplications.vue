<template>
  <LychenContainer class="flex flex-col items-center gap-4">
    <LychenTitle variant="h2">{{ t('applications.title') }}</LychenTitle>
    <LychenTitle
      variant="h2"
      class="opacity-80 text-center"
      >{{ t('applications.second_title') }}</LychenTitle
    >

    <LychenCarousel
      class="w-full mt-10"
      :opts="{
        align: 'start',
      }"
    >
      <LychenCarouselContent>
        <LychenCarouselItem
          v-for="application in sortedApplicationsList"
          :key="application.title"
          class="md:basis-1/2 lg:basis-1/4"
        >
          <ApplicationCard
            :application="application"
            background-image-folder="applications-covers"
            class="bg-surface-container rounded-3xl min-h-[500px] p-6"
          />
        </LychenCarouselItem>
      </LychenCarouselContent>
      <LychenCarouselPrevious />
      <LychenCarouselNext />
    </LychenCarousel>
  </LychenContainer>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useApplicationsCatalog } from '@lychen/applications-util-composables/useApplicationsCatalog';
import ApplicationCard from '@lychen/applications-ui-components/ApplicationCard.vue';
import LychenCarousel from '@lychen/ui-components/carousel/LychenCarousel.vue';
import LychenCarouselItem from '@lychen/ui-components/carousel/LychenCarouselItem.vue';
import LychenCarouselPrevious from '@lychen/ui-components/carousel/LychenCarouselPrevious.vue';
import LychenCarouselNext from '@lychen/ui-components/carousel/LychenCarouselNext.vue';
import LychenCarouselContent from '@lychen/ui-components/carousel/LychenCarouselContent.vue';

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { sortedApplicationsList } = useApplicationsCatalog();
</script>
