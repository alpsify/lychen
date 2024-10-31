<template>
  <LychenHero class="text-surface-on flex flex-col gap-4 items-center justify-center text-center">
    <LychenTitle variant="h1">{{ t('title') }}</LychenTitle>
    <LychenParagraph
      class="md:w-4/6"
      variant="website-default"
      >{{ t('paragraph') }}
    </LychenParagraph>
    <LychenParagraph
      variant="website-default"
      class="opacity-80"
      >{{ t('paragraph_complement') }}
    </LychenParagraph>
    <img
      src="./assets/smile_atiGofFl0TgADvvhneAEk.webp"
      class="rounded-md"
    />
  </LychenHero>
</template>

<script lang="ts" setup>
import { defineAsyncComponent } from 'vue';

import { useTranslations } from './i18n';

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenHero = defineAsyncComponent(() => import('@lychen/ui-components/hero/LychenHero.vue'));

const { t } = useTranslations();
</script>

<style lang="css" scoped></style>
