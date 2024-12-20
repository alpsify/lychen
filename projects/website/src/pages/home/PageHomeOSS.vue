<template>
  <LychenContainer class="flex flex-col items-stretch justify-center">
    <RouterLink :to="RoutePageManifest">
      <LychenDivWithBackgroundImage
        :background-image="ossUrl"
        overlay
        overlay-class="bg-surface-on dark:bg-surface opacity-50"
        class="p-8 rounded-xl py-24 group"
      >
        <div class="relative flex flex-col items-center gap-8 z-10">
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
            class="flex flex-row gap-2 group-hover:bg-primary group-hover:text-primary-on"
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

import { useTranslations } from './i18n';
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

const { t } = useTranslations();
</script>

<style scoped>
.overlay {
  border-radius: inherit;
}
</style>
