<template>
  <div
    id="hero"
    class="flex flex-col justify-start"
    :class="y > 10 ? 'scaled-down' : ''"
  >
    <LychenHero
      class="text-surface dark:text-surface-on flex flex-row items-center justify-start gap-4 min-h-dvh"
      :background-image="heroUrl"
      overlay
      overlay-class="bg-surface-on dark:bg-surface opacity-40"
    >
      <div class="flex flex-col md:w-3/5 items-start gap-4">
        <LychenTitle
          variant="h1"
          class="text-balance z-20"
          >{{ t('hero.title.prepend') }}
          {{ t('hero.title.key_word') }}
          {{ t('hero.title.append') }}</LychenTitle
        >
        <LychenParagraph
          variant="website-highlight"
          class="z-20"
          >{{ t('hero.description') }}
        </LychenParagraph>
        <div class="flex flex-row gap-4 items-center">
          <RouterLink
            to="#discover"
            class="z-20"
          >
            <LychenButton
              class="flex gap-2"
              data-umami-event="discover-button"
              >{{ t('hero.discover') }}
            </LychenButton>
          </RouterLink>
          <RouterLink
            :to="RoutePageSponsor"
            class="z-20"
          >
            <LychenRainbowBox class="flex flex-row text-surface gap-2 rounded-full no-wrap">
              <LychenIcon
                icon="handshake-angle"
                class="fa-lg"
              />{{ t('hero.sponsor_us') }}
            </LychenRainbowBox>
          </RouterLink>
        </div>
      </div>
    </LychenHero>
  </div>
</template>

<script setup lang="ts">
import heroUrl from './assets/hero-2.webp';
import { defineAsyncComponent } from 'vue';
import { useWindowScroll } from '@vueuse/core';

import { useTranslations } from './i18n';
import { RoutePageSponsor } from '../sponsor';

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

const LychenRainbowBox = defineAsyncComponent(
  () => import('@lychen/ui-components/rainbow-box/LychenRainbowBox.vue'),
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

:deep(.blobed) {
  border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
}
</style>
