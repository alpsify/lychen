<template>
  <div
    id="hero"
    class="flex flex-col justify-start"
    :class="y > 50 ? 'scaled-down' : ''"
  >
    <LychenHero
      class="text-surface dark:text-surface-on flex flex-row items-center justify-start gap-4 min-h-dvh"
      :background-image="heroUrl"
      overlay
      overlay-class="bg-surface-on dark:bg-surface opacity-40"
    >
      <div class="z-10 flex md:basis-3/5 items-start flex-col gap-4">
        <LychenTitle
          variant="h1"
          class="text-balance"
          >{{ t('hero.title.prepend') }}
          {{ t('hero.title.key_word') }}
          {{ t('hero.title.append') }}</LychenTitle
        >
        <LychenParagraph variant="website-highlight">{{ t('hero.description') }} </LychenParagraph>
        <RouterLink to="#definition">
          <LychenButton
            class="flex gap-2"
            data-umami-event="discover-button"
            >{{ t('hero.discover') }}
          </LychenButton>
        </RouterLink>
      </div>
    </LychenHero>
  </div>
</template>

<script setup lang="ts">
import heroUrl from './assets/hero-2.webp';
import { defineAsyncComponent } from 'vue';
import { useWindowScroll } from '@vueuse/core';

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

const { t } = useTranslations();

const { y } = useWindowScroll();
</script>

<style scoped>
#hero {
  --time: 1.2s;
  top: 0;
  scale: 1;
  transition: all var(--time) ease-in-out;
  border-radius: 0px;
  header {
    transition: all var(--time) ease-in-out;
  }
}

#hero.scaled-down {
  scale: 0.9;
  header {
    border-radius: 50px;
  }
}
</style>
