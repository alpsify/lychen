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
            class="basis-2/3 sm:basis-2/5 md:basis-2/5 lg:basis-2/7"
          >
            <LychenDialogTrigger as-child>
              <ApplicationCard
                :application="application"
                background-image-folder="applications-covers"
                class="bg-surface-container rounded-3xl min-h-[400px] md:min-h-[500px] p-6 cursor-pointer"
                :data-umami-event="`Clicks on ${application.alias} card`"
                @click="selectedApplication = application"
              >
                <template #footer
                  ><LychenButton
                    class="text-sm self-center z-10 justify-end animate-in slide-in-from-bottom-4 duration-300 md:hidden md:group-hover:flex"
                    size="sm"
                  >
                    {{ t('applications.see_features') }}
                  </LychenButton></template
                >
              </ApplicationCard>
            </LychenDialogTrigger>
          </LychenCarouselItem>
        </LychenCarouselContent>
        <LychenCarouselPrevious />
        <LychenCarouselNext />
      </LychenCarousel>
      <LychenDialogContent
        class="bg-surface-container-high/70 backdrop-blur-xl text-on-surface-container md:max-w-[50%] w-full max-h-dvh overflow-y-auto gap-8"
      >
        <div
          class="flex flex-col justify-between gap-4 bg-secondary-container text-on-secondary-container rounded-3xl p-4 md:p-6 items-stretch"
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
        <ApplicationsGridFeatures :features="features" />
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
import LychenCarousel from '@lychen/ui-components/carousel/LychenCarousel.vue';
import LychenCarouselItem from '@lychen/ui-components/carousel/LychenCarouselItem.vue';
import LychenCarouselPrevious from '@lychen/ui-components/carousel/LychenCarouselPrevious.vue';
import LychenCarouselNext from '@lychen/ui-components/carousel/LychenCarouselNext.vue';
import LychenCarouselContent from '@lychen/ui-components/carousel/LychenCarouselContent.vue';
import LychenParagraph from '@lychen/ui-components/paragraph/LychenParagraph.vue';
import LychenButton from '@lychen/ui-components/button/LychenButton.vue';
import LychenIcon from '@lychen/ui-components/icon/LychenIcon.vue';
import LychenDialogTrigger from '@lychen/ui-components/dialog/LychenDialogTrigger.vue';
import { useApplicationsFeatures } from '@lychen/applications-util-composables/useApplicationsFeatures';
import LychenDialogClose from '@lychen/ui-components/dialog/LychenDialogClose.vue';
import ApplicationsGridFeatures from '@lychen/applications-ui-components/grids/ApplicationsGridFeatures.vue';

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
