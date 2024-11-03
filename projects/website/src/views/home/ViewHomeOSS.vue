<template>
  <LychenContainer class="flex flex-row gap-4">
    <div class="flex basis-1/2 flex-col justify-center gap-4">
      <LychenTitle variant="h2">{{ t('oss.title') }}</LychenTitle>
      <LychenParagraph variant="website-default">{{ t('oss.description') }}</LychenParagraph>
      <div class="grid grid-cols-2 grid-rows-2 gap-4">
        <div
          class="bg-surface-container-low flex flex-col items-center justify-center gap-4 rounded-lg p-10"
        >
          <LychenIcon
            icon="lock-open"
            class="fa-2xl opacity-70"
          />{{ t('oss.key_point.no_vendor_lockin') }}
        </div>
        <div
          class="bg-surface-container-low flex flex-col items-center justify-center gap-4 rounded-lg p-10"
        >
          <LychenIcon
            icon="arrow-up-right-and-arrow-down-left-from-center"
            class="fa-2xl opacity-70"
          />{{ t('oss.key_point.scalable') }}
        </div>
        <div
          class="bg-surface-container-low flex flex-col items-center justify-center gap-4 rounded-lg p-10"
        >
          <LychenIcon
            icon="plug-circle-plus"
            class="fa-2xl opacity-70"
          />{{ t('oss.key_point.extensible') }}
        </div>
        <div
          class="bg-surface-container-low flex flex-col items-center justify-center gap-4 rounded-lg p-10"
        >
          <LychenIcon
            icon="cloud-arrow-up"
            class="fa-2xl opacity-70"
          />{{ t('oss.key_point.cloud_or_self_hosted') }}
        </div>
      </div>
      <LychenParagraph
        variant="website-default"
        class="self-center"
        >{{ t('oss.sub_description') }}</LychenParagraph
      >
    </div>
    <LychenRippleContainer
      class="flex w-full basis-1/2 flex-col items-center justify-center md:w-full lg:w-full"
    >
      <p class="z-10 whitespace-pre-wrap text-center text-5xl font-medium tracking-tight">OSS</p>
      <span>Open Source Software</span>
    </LychenRippleContainer>
  </LychenContainer>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

import { useTranslations } from './i18n';
import LychenRippleContainer from '@lychen/ui-components/ripple/LychenRippleContainer.vue';

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
