<template>
  <SectionWithTitle :title="t('title')">
    <DivWithBackgroundImg
      :background-image="bannerImg"
      overlay
      overlay-class="bg-gradient-to-tr from-tertiary-container to-tertiary-container/60"
      class="p-8 lg:py-20 rounded-xl flex flex-col gap-4 text-on-tertiary-container"
    >
      <BaseHeading
        variant="h2"
        class="z-10 text-on-tertiary-container"
        >{{ t('banner.title') }}</BaseHeading
      >
      <p class="lg:w-2/3 z-10">
        {{ t('banner.description') }}
      </p>
    </DivWithBackgroundImg>
    <div>
      <BaseHeading variant="h2">
        {{ t('global.title') }}
      </BaseHeading>
      <p>{{ t('global.description') }}</p>
    </div>
    <div>
      <BaseHeading variant="h2">
        {{ t('custom.title') }}
      </BaseHeading>
      <p>{{ t('custom.description') }}</p>
    </div>
  </SectionWithTitle>
</template>

<script lang="ts" setup>
import bannerImg from './assets/banner.webp';
import SectionWithTitle from '@lychen/vue-ui-components-app/section-with-title/SectionWithTitle.vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { BaseHeading } from '@lychen/vue-ui-components-app/base-heading';
import { defineAsyncComponent } from 'vue';

const DivWithBackgroundImg = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-extra/div-with-background-img/DivWithBackgroundImg.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
