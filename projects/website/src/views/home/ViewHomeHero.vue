<template>
  <LychenHero
    class="text-surface dark:text-surface-on flex flex-row items-center justify-center gap-4 min-h-dvh"
    :background-image="heroUrl"
    overlay
    overlay-class="bg-surface-on dark:bg-surface opacity-60"
  >
    <div class="z-10 flex basis-4/5 items-center flex-col gap-4">
      <LychenTitle
        variant="h1"
        class="text-center text-balance"
        >{{ t('hero.title.prepend')
        }}<LychenTextHighlight
          class="rounded-xl gradient-text-background"
          text-end-color="rgb(var(--color-on-primary))"
        >
          {{ t('hero.title.key_word') }} </LychenTextHighlight
        >{{ t('hero.title.append') }}</LychenTitle
      >
      <LychenParagraph
        variant="website-highlight"
        class="text-center w-4/5"
        >{{ t('hero.description') }}
      </LychenParagraph>
      <RouterLink
        to="#definition"
        class="self-center"
      >
        <LychenButton class="flex gap-2">{{ t('hero.discover') }} </LychenButton>
      </RouterLink>
    </div>
  </LychenHero>
</template>

<script setup lang="ts">
import heroUrl from '../assets/hero-1.webp';
import { defineAsyncComponent } from 'vue';

import { useTranslations } from './i18n';
import LychenTextHighlight from '@lychen/ui-components/text-highlight/LychenTextHighlight.vue';

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

const { t } = useTranslations();
</script>

<style>
.gradient-text-background {
  background-image: linear-gradient(
    45deg,
    rgb(var(--color-primary)) 0%,
    rgb(var(--color-secondary)) 50%,
    rgb(var(--color-tertiary)) 100%
  );
}
</style>
