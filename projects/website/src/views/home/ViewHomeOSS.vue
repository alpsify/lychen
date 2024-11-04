<template>
  <LychenContainer class="flex flex-row gap-4">
    <div class="flex basis-1/2 flex-col justify-center gap-4">
      <LychenTitle variant="h2">{{ t('oss.title') }}</LychenTitle>
      <LychenParagraph variant="website-default">{{ t('oss.description') }}</LychenParagraph>
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
      class="relative flex w-full basis-1/2 flex-col items-center justify-center md:w-full lg:w-full"
    >
      <p class="z-10 whitespace-pre-wrap text-center text-5xl font-medium tracking-tight">OSS</p>
      <span>Open Source Software</span>
      <LychenRipple
        :number-of-circles="4"
        class="[mask-image:linear-gradient(to_bottom,white,transparent)]"
        circle-class="border-[rgb(var(--color-secondary))] bg-secondary/50 blobed"
      />
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

import { useTranslations } from './i18n';

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
