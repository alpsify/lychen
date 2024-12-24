<template>
  <LychenContainer class="flex flex-col items-center gap-4">
    <LychenTitle variant="h2">{{ t('applications.title') }}</LychenTitle>
    <LychenTitle
      variant="h2"
      class="opacity-80 text-center"
      >{{ t('applications.second_title') }}</LychenTitle
    >
    <LychenDrawer side="right">
      <LychenCarousel
        class="w-[85%] sm:w-[90%] mt-10"
        :opts="{
          align: 'start',
        }"
      >
        <LychenCarouselContent>
          <LychenCarouselItem
            v-for="application in opiniatedApplicationsList"
            :key="application.title"
            class="sm:basis-1/2 md:basis-1/2 lg:basis-1/4"
          >
            <LychenDrawerTrigger as-child>
              <ApplicationCard
                :application="application"
                background-image-folder="applications-covers"
                class="bg-surface-container rounded-3xl min-h-[500px] p-6 cursor-pointer"
                @click="selectedApplication = application"
              />
            </LychenDrawerTrigger>
          </LychenCarouselItem>
        </LychenCarouselContent>
        <LychenCarouselPrevious />
        <LychenCarouselNext />
      </LychenCarousel>
      <LychenDrawerContent class="bg-surface-container-high text-surface-container-on w-full">
        <div class="h-2 bg-surface/50 rounded-full w-1/6 self-center cursor-pointer"></div>

        <div class="grid grid-cols-1 grid-rows-auto md:grid-cols-4 md:grid-rows-1 py-6 gap-4">
          <div
            class="flex flex-col justify-between gap-4 items-start bg-surface-container rounded-3xl p-6"
          >
            <div class="flex flex-col gap-2">
              <ApplicationTitle
                class="text-3xl"
                :value="selectedApplication.title"
              />
              <LychenParagraph>{{ selectedApplication.description }}</LychenParagraph>
            </div>
            <a
              :href="selectedApplication.link"
              target="_blank"
            >
              <LychenButton
                class="flex flex-row gap-2"
                size="sm"
                >Site web <LychenIcon icon="link"
              /></LychenButton>
            </a>
          </div>
          <div
            v-for="group in features"
            :key="group"
          >
            <p class="text-lg font-bold opacity-60">{{ group.title }}</p>
            <ApplicationFeatureCard
              v-for="feature in group.features"
              v-bind="feature"
              :key="feature.alias"
              class="pl-0"
            />
          </div>
        </div>
      </LychenDrawerContent>
    </LychenDrawer>
  </LychenContainer>
</template>

<script setup lang="ts">
import { defineAsyncComponent, onBeforeUnmount, ref, watch } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { useApplicationsCatalog } from '@lychen/applications-util-composables/useApplicationsCatalog';
import ApplicationCard from '@lychen/applications-ui-components/ApplicationCard.vue';
import ApplicationTitle from '@lychen/applications-ui-components/ApplicationTitle.vue';
import ApplicationFeatureCard from '@lychen/applications-ui-components/ApplicationFeatureCard.vue';
import LychenCarousel from '@lychen/ui-components/carousel/LychenCarousel.vue';
import LychenCarouselItem from '@lychen/ui-components/carousel/LychenCarouselItem.vue';
import LychenCarouselPrevious from '@lychen/ui-components/carousel/LychenCarouselPrevious.vue';
import LychenCarouselNext from '@lychen/ui-components/carousel/LychenCarouselNext.vue';
import LychenCarouselContent from '@lychen/ui-components/carousel/LychenCarouselContent.vue';
import LychenParagraph from '@lychen/ui-components/paragraph/LychenParagraph.vue';
import LychenButton from '@lychen/ui-components/button/LychenButton.vue';
import LychenIcon from '@lychen/ui-components/icon/LychenIcon.vue';
import { LychenDrawerTrigger } from '@lychen/ui-components/drawer';
import { useApplicationsFeatures } from '@lychen/applications-util-composables/useApplicationsFeatures';

const LychenDrawer = defineAsyncComponent(
  () => import('@lychen/ui-components/drawer/LychenDrawer.vue'),
);

const LychenDrawerContent = defineAsyncComponent(
  () => import('@lychen/ui-components/drawer/LychenDrawerContent.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { opiniatedApplicationsList } = useApplicationsCatalog();
const { getFeaturesOrganizedByGroup } = useApplicationsFeatures();

const selectedApplication = ref();
const features = ref();

const unwatch = watch(selectedApplication, () => {
  if (selectedApplication.value) {
    features.value = getFeaturesOrganizedByGroup(selectedApplication.value.alias);
  }
});

onBeforeUnmount(() => {
  unwatch();
});
</script>
