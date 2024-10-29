<template>
  <LychenHero
    class="flex flex-col-reverse lg:flex-row gap-4 items-center text-surface-on"
    background-image="https://img.passeportsante.net/1200x675/2021-05-03/i103871-lichens-hm.webp"
    overlay
    overlay-class="bg-surface opacity-50">
    <div class="basis-1/2 flex flex-col gap-2 z-10 items-start">
      <LychenTitle variant="h1">{{ t('hero.title') }}</LychenTitle>
      <LychenParagraph
        variant="website-default"
        class="opacity-80"
      >{{ t('hero.description') }}
      </LychenParagraph
      >
      <LychenButton class="flex gap-2"
      >{{ t('hero.discover') }}
        <LychenIcon icon="arrow-right"
        />
      </LychenButton>
    </div>
    <div class="basis-1/2"></div>
  </LychenHero>
</template>

<script setup lang="ts">
import {defineAsyncComponent} from 'vue';

import {useTranslations} from './i18n';

const LychenHero = defineAsyncComponent(() => import('@lychen/ui-components/hero/LychenHero.vue'));
const LychenButton = defineAsyncComponent(() => import('@lychen/ui-components/button/LychenButton.vue'));
const LychenTitle = defineAsyncComponent(() => import('@lychen/ui-components/title/LychenTitle.vue'));
const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);
const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const {t} = useTranslations();
</script>
