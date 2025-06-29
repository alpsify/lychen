<template>
  <Container class="flex flex-col items-center gap-4">
    <Title variant="h2">{{ t('applications.title') }}</Title>
    <Title
      variant="h2"
      class="opacity-80 text-center"
      >{{ t('applications.second_title') }}</Title
    >
    <Dialog v-model:open="isOpen">
      <Carousel
        class="w-[85%] sm:w-[90%] mt-10"
        :opts="{
          align: 'start',
        }"
      >
        <CarouselContent>
          <CarouselItem
            v-for="application in opiniatedApplicationsList"
            :key="application.title"
            class="basis-2/3 sm:basis-2/5 md:basis-2/5 lg:basis-2/7"
          >
            <DialogTrigger as-child>
              <ApplicationCard
                :application="application"
                background-image-folder="applications-covers"
                class="bg-surface-container rounded-3xl min-h-[400px] md:min-h-[500px] p-6 cursor-pointer"
                :data-umami-event="`Clicks on ${application.alias} card`"
                @click="selectedApplication = application"
              >
                <template #footer
                  ><Button
                    class="text-sm self-center z-10 justify-end animate-in slide-in-from-bottom-4 duration-300 md:hidden md:group-hover:flex"
                    size="sm"
                  >
                    {{ t('applications.see_features') }}
                  </Button></template
                >
              </ApplicationCard>
            </DialogTrigger>
          </CarouselItem>
        </CarouselContent>
        <CarouselPrevious />
        <CarouselNext />
      </Carousel>
      <DialogContent class="md:max-w-[50%] w-full max-h-dvh gap-8">
        <div
          class="flex flex-col justify-between gap-4 bg-secondary-container text-on-secondary-container rounded-3xl p-4 md:p-6 items-stretch overflow-y-auto"
        >
          <div class="flex flex-col gap-2">
            <div class="flex flex-row justify-between items-center">
              <ApplicationTitle
                class="text-3xl"
                :value="selectedApplication.title"
              />
              <DialogClose />
            </div>

            <Paragraph>{{ selectedApplication.description }}</Paragraph>
          </div>
          <a
            :href="selectedApplication.link"
            target="_blank"
          >
            <Button
              class="flex flex-row gap-2"
              size="sm"
              variant="outline"
              >Site web <Icon :icon="faLink"
            /></Button>
          </a>
        </div>
        <ApplicationsGridFeatures :features="features" />
      </DialogContent>
    </Dialog>
  </Container>
</template>

<script setup lang="ts">
import { defineAsyncComponent, onBeforeUnmount, ref, watch } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { useApplicationsCatalog } from '@lychen/applications-composables/useApplicationsCatalog';
import ApplicationCard from '@lychen/applications-components/ApplicationCard.vue';
import ApplicationTitle from '@lychen/applications-components/ApplicationTitle.vue';
import Carousel from '@lychen/vue-components-core/carousel/Carousel.vue';
import CarouselItem from '@lychen/vue-components-core/carousel/CarouselItem.vue';
import CarouselPrevious from '@lychen/vue-components-core/carousel/CarouselPrevious.vue';
import CarouselNext from '@lychen/vue-components-core/carousel/CarouselNext.vue';
import CarouselContent from '@lychen/vue-components-core/carousel/CarouselContent.vue';
import Paragraph from '@lychen/vue-components-website/paragraph/Paragraph.vue';
import Button from '@lychen/vue-components-core/button/Button.vue';
import Icon from '@lychen/vue-components-core/icon/Icon.vue';
import DialogTrigger from '@lychen/vue-components-core/dialog/DialogTrigger.vue';
import { useApplicationsFeatures } from '@lychen/applications-composables/useApplicationsFeatures';
import DialogClose from '@lychen/vue-components-core/dialog/DialogClose.vue';
import ApplicationsGridFeatures from '@lychen/applications-components/grids/ApplicationsGridFeatures.vue';
import { faLink } from '@fortawesome/pro-light-svg-icons/faLink';

const Dialog = defineAsyncComponent(() => import('@lychen/vue-components-core/dialog/Dialog.vue'));

const DialogContent = defineAsyncComponent(
  () => import('@lychen/vue-components-core/dialog/DialogContent.vue'),
);

const Title = defineAsyncComponent(() => import('@lychen/vue-components-website/title/Title.vue'));

const Container = defineAsyncComponent(
  () => import('@lychen/vue-components-website/container/Container.vue'),
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
