<template>
  <LychenHero
    class="text-surface-on flex flex-col-reverse items-center gap-4 lg:flex-row"
    :background-image="heroUrl"
    overlay
    overlay-class="bg-surface opacity-50"
  >
    <div class="z-10 flex basis-1/2 flex-col items-start gap-2">
      <LychenTitle variant="h1">{{ t('hero.title') }}</LychenTitle>
      <LychenParagraph
        variant="website-default"
        class="opacity-80"
        >{{ t('hero.description') }}
      </LychenParagraph>
      <RouterLink to="#definition">
        <LychenButton class="flex gap-2"
          >{{ t('hero.discover') }}
          <LychenIcon icon="chevron-down" />
        </LychenButton>
      </RouterLink>
    </div>
    <div class="basis-1/2"></div>
  </LychenHero>
</template>

<script setup lang="ts">
import heroUrl from '../assets/hero-1.webp';
import { defineAsyncComponent } from 'vue';

import { useTranslations } from './i18n';

const LychenHero = defineAsyncComponent(() => import('@lychen/ui-components/hero/LychenHero.vue'));
const LychenButton = defineAsyncComponent(
  () => import('@lychen/ui-components/button/LychenButton.vue'),
);
const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);
const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);
const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const { t } = useTranslations();
</script>
