<template>
  <LychenContainer class="flex flex-col items-stretch justify-center">
    <RouterLink :to="RoutePageManifest">
      <LychenDivWithBackgroundImage
        :background-image="ossUrl"
        overlay
        overlay-class="bg-on-surface dark:bg-surface opacity-50"
        class="p-8 rounded-3xl py-24 group"
      >
        <div
          class="relative flex flex-col items-center gap-8 z-10 text-surface dark:text-on-surface"
        >
          <LychenTitle
            variant="h2"
            class="md:basis-2/5 text-center"
            >{{ t('oss.title') }}</LychenTitle
          >
          <LychenParagraph
            variant="website-highlight"
            class="opacity-90 md:w-3/5 text-center"
            >{{ t('oss.description') }}</LychenParagraph
          >
          <LychenButton
            variant="ghost"
            class="flex flex-row gap-2 group-hover:bg-primary group-hover:text-on-primary"
            >{{ t('oss.button.label') }} <LychenIcon icon="chevron-right"
          /></LychenButton>
        </div>
      </LychenDivWithBackgroundImage>
    </RouterLink>
  </LychenContainer>
</template>

<script setup lang="ts">
import ossUrl from './assets/oss.webp';
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { RoutePageManifest } from '../manifest';

const LychenDivWithBackgroundImage = defineAsyncComponent(
  () => import('@lychen/ui-components/div/LychenDivWithBackgroundImage.vue'),
);

const LychenButton = defineAsyncComponent(
  () => import('@lychen/ui-components/button/LychenButton.vue'),
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

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style scoped>
.overlay {
  border-radius: inherit;
}
</style>
