<template>
  <LychenDivScalingDown class="flex flex-col justify-start">
    <LychenHero
      class="text-surface dark:text-on-surface flex flex-row items-center justify-start gap-4 min-h-dvh"
      :overlay="true"
      :background-image="heroImg"
      overlay-class="bg-on-surface dark:bg-surface opacity-40"
    >
      <div class="flex flex-col md:w-3/5 items-start gap-4">
        <LychenTitle
          variant="h1"
          class="text-balance z-20"
          >{{ t('hero.title') }}</LychenTitle
        >
        <LychenParagraph
          variant="website-highlight"
          class="z-20"
          >{{ t('hero.description') }}
        </LychenParagraph>

        <RouterLink
          to="#discover"
          class="z-20"
        >
          <LychenButton
            class="flex gap-2"
            data-umami-event="features-button"
            >{{ t('hero.button.features.label') }}
            <LychenIcon
              icon="chevron-down"
              beat
            />
          </LychenButton>
        </RouterLink>
      </div>
    </LychenHero>
  </LychenDivScalingDown>
</template>

<script setup lang="ts">
import heroImg from './assets/HeroImage3.webp';
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import LychenButton from '@lychen/ui-components/button/LychenButton.vue';
import LychenIcon from '@lychen/ui-components/icon/LychenIcon.vue';

const LychenDivScalingDown = defineAsyncComponent(
  () => import('@lychen/ui-components/div/LychenDivScalingDown.vue'),
);

const LychenHero = defineAsyncComponent(() => import('@lychen/ui-components/hero/LychenHero.vue'));
const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);
const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);
const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
