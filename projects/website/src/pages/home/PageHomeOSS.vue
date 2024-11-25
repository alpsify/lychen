<template>
  <LychenContainer class="flex flex-col-reverse items-center gap-4 overflow-x-clip lg:flex-row">
    <div class="flex basis-1/2 flex-col justify-center gap-4">
      <RouterLink :to="RoutePageManifest">
        <LychenButton
          varient="primary"
          class="flex flex-row gap-2"
          >{{ t('oss.button.label') }} <LychenIcon icon="chevron-right"
        /></LychenButton>
      </RouterLink>
      <LychenTitle variant="h2">{{ t('oss.title') }}</LychenTitle>
      <LychenParagraph
        variant="website-default"
        class="opacity-80"
        >{{ t('oss.description') }}</LychenParagraph
      >

      <div class="grid grid-cols-2 grid-rows-2 gap-4">
        <LychenCard
          class="bg-surface-container-low flex flex-col items-center justify-center gap-4 rounded-lg p-10"
        >
          <LychenIcon
            icon="lock-open"
            class="fa-2xl opacity-70"
          />{{ t('oss.key_point.no_vendor_lockin') }}
        </LychenCard>
        <LychenCard
          class="bg-surface-container-low flex flex-col items-center justify-center gap-4 rounded-lg p-10"
        >
          <LychenIcon
            icon="arrow-up-right-and-arrow-down-left-from-center"
            class="fa-2xl opacity-70"
          />{{ t('oss.key_point.scalable') }}
        </LychenCard>
        <LychenCard
          class="bg-surface-container-low flex flex-col items-center justify-center gap-4 rounded-lg p-10"
        >
          <LychenIcon
            icon="plug-circle-plus"
            class="fa-2xl opacity-70"
          />{{ t('oss.key_point.extensible') }}
        </LychenCard>
        <LychenCard
          class="bg-surface-container-low flex flex-col items-center justify-center gap-4 rounded-lg p-10"
        >
          <LychenIcon
            icon="cloud-arrow-up"
            class="fa-2xl opacity-70"
          />{{ t('oss.key_point.cloud_or_self_hosted') }}
        </LychenCard>
      </div>
      <LychenParagraph
        variant="website-default"
        class="self-center"
        >{{ t('oss.sub_description') }}</LychenParagraph
      >
    </div>
    <div
      class="relative flex h-[300px] w-full flex-col items-center justify-center md:w-full lg:size-full lg:basis-1/2"
    >
      <p class="z-10 whitespace-pre-wrap text-center text-5xl font-medium tracking-tight">OSS</p>
      <span>Open Source Software</span>
      <LychenRipple
        :number-of-circles="4"
        circle-class="border-[rgb(var(--color-primary))] bg-primary/25 blobed"
      />
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

import { useTranslations } from './i18n';
import { RoutePageManifest } from '../manifest';

const LychenButton = defineAsyncComponent(
  () => import('@lychen/ui-components/button/LychenButton.vue'),
);

const LychenCard = defineAsyncComponent(() => import('@lychen/ui-components/card/LychenCard.vue'));

const LychenRipple = defineAsyncComponent(
  () => import('@lychen/ui-components/ripple/LychenRipple.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);
const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);

const { t } = useTranslations();
</script>

<style scoped>
:deep(.blobed) {
  border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
}
</style>
