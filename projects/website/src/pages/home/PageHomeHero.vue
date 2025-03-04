<template>
  <DivScalingDown class="flex flex-col justify-start">
    <Hero
      class="text-surface dark:text-on-surface flex flex-row items-center justify-start gap-4 min-h-dvh"
      :background-image="heroUrl"
      overlay
      overlay-class="bg-on-surface dark:bg-surface opacity-40"
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
              :text="t('hero.discover')"
            />
          </RouterLink>
          <RouterLink
            :to="RoutePageSponsor"
            class="z-20"
          >
            <LychenRainbowBox class="flex flex-row text-surface gap-2 rounded-full no-wrap">
              {{ t('hero.sponsor_us')
              }}<LychenIcon
                icon="hands-holding-heart"
                class="fa-lg"
              />
            </LychenRainbowBox>
          </RouterLink>
        </div>
      </div>
    </Hero>
  </DivScalingDown>
</template>

<script setup lang="ts">
import heroUrl from './assets/hero-2.webp';
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { RoutePageSponsor } from '../sponsor';

const DivScalingDown = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-extra/div-scaling-down/DivScalingDown.vue'),
);

const Hero = defineAsyncComponent(() => import('@lychen/vue-ui-components-website/hero/Hero.vue'));
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
const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style scoped>
:deep(.blobed) {
  border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
}
</style>
