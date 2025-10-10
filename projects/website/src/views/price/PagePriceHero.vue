<template>
  <DivScalingDown>
    <Hero
      class="dark:text-on-surface text-surface flex min-h-[30dvh] flex-col items-center justify-center gap-4 rounded-b-3xl bg-gradient-to-tr from-[#EECDA3] to-[#EF629F] pt-20 text-center md:min-h-[60dvh]"
    >
      <div class="flex basis-3/4 flex-col items-center gap-4">
        <Title variant="h1">{{ t('title') }}</Title>
      </div>
    </Hero>
  </DivScalingDown>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';

const Title = defineAsyncComponent(() => import('@lychen/vue-components-website/title/Title.vue'));

const DivScalingDown = defineAsyncComponent(
  () => import('@lychen/vue-components-extra/div-scaling-down/DivScalingDown.vue'),
);

const Hero = defineAsyncComponent(() => import('@lychen/vue-components-website/hero/Hero.vue'));

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
