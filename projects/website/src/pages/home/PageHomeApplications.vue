<template>
  <LychenContainer class="flex flex-col items-center gap-4">
    <LychenTitle variant="h2">{{ t('applications.title') }}</LychenTitle>
    <LychenTitle
      variant="h2"
      class="opacity-80 text-center"
      >{{ t('applications.second_title') }}</LychenTitle
    >
    <LychenDialog v-model:open="isOpen">
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
            <LychenDialogTrigger as-child>
              <ApplicationCard
                :application="application"
                background-image-folder="applications-covers"
                class="bg-surface-container rounded-3xl min-h-[400px] md:min-h-[500px] p-6 cursor-pointer"
                @click="selectedApplication = application"
              >
                <template #footer
                  ><div
                    class="text-sm self-center z-10 justify-end animate-in slide-in-from-bottom-4 duration-300 md:hidden md:group-hover:flex bg-primary text-primary-on px-4 py-2 rounded-full"
                  >
                    {{ t('applications.see_features') }}
                  </div></template
                >
              </ApplicationCard>
            </LychenDialogTrigger>
          </LychenCarouselItem>
        </LychenCarouselContent>
        <LychenCarouselPrevious />
        <LychenCarouselNext />
      </LychenCarousel>
      <LychenDialogContent
        class="bg-surface-container-high/70 backdrop-blur-xl text-surface-container-on md:max-w-[50%] w-full max-h-dvh overflow-y-auto gap-8"
      >
        <div
          class="flex flex-col justify-between gap-4 bg-secondary-container text-secondary-container-on rounded-3xl p-4 md:p-6 items-stretch"
        >
          <div class="flex flex-col gap-2">
            <div class="flex flex-row justify-between items-center">
              <ApplicationTitle
                class="text-3xl"
                :value="selectedApplication.title"
              />
              <LychenDialogClose />
            </div>

            <LychenParagraph>{{ selectedApplication.description }}</LychenParagraph>
          </div>
          <a
            :href="selectedApplication.link"
            target="_blank"
          >
            <LychenButton
              class="flex flex-row gap-2"
              size="sm"
              variant="secondary"
              >Site web <LychenIcon icon="link"
            /></LychenButton>
          </a>
        </div>
        <div class="grid grid-cols-1 grid-rows-auto md:grid-cols-fluid md:grid-rows-1 gap-10">
          <div
            v-for="group in features"
            :key="group"
          >
            <p class="text-xl opacity-60 uppercase">{{ group.title }}</p>
            <ApplicationFeatureCard
              v-for="feature in group.features"
              v-bind="feature"
              :key="feature.alias"
              class="pl-0"
            />
          </div>
        </div>
      </LychenDialogContent>
    </LychenDialog>
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
import { LychenDialogTrigger } from '@lychen/ui-components/dialog';
import { useApplicationsFeatures } from '@lychen/applications-util-composables/useApplicationsFeatures';
import LychenDialogClose from '@lychen/ui-components/dialog/LychenDialogClose.vue';

const LychenDialog = defineAsyncComponent(
  () => import('@lychen/ui-components/dialog/LychenDialog.vue'),
);

const LychenDialogContent = defineAsyncComponent(
  () => import('@lychen/ui-components/dialog/LychenDialogContent.vue'),
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

const isOpen = ref(false);

onBeforeUnmount(() => {
  unwatch();
});
</script>
