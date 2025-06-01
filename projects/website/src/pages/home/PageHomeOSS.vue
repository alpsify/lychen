<template>
  <Container class="flex flex-col items-stretch justify-center">
    <RouterLink :to="RoutePageManifest">
      <DivWithBackgroundImg
        :background-image="ossUrl"
        overlay
        overlay-class="bg-on-surface dark:bg-surface opacity-50"
        class="p-8 rounded-3xl py-24 group"
      >
        <div
          class="relative flex flex-col items-center gap-8 z-10 text-surface dark:text-on-surface"
        >
          <Title
            variant="h2"
            class="md:basis-2/5 text-center"
            >{{ t('oss.title') }}</Title
          >
          <Paragraph
            variant="website-highlight"
            class="opacity-90 md:w-3/5 text-center"
            >{{ t('oss.description') }}</Paragraph
          >
          <Button
            variant="ghost"
            class="flex flex-row gap-2 group-hover:bg-primary group-hover:text-on-primary"
            >{{ t('oss.button.label') }} <Icon :icon="faChevronRight"
          /></Button>
        </div>
      </DivWithBackgroundImg>
    </RouterLink>
  </Container>
</template>

<script setup lang="ts">
import ossUrl from './assets/oss.webp';
import { defineAsyncComponent } from 'vue';
import { faChevronRight } from '@fortawesome/pro-light-svg-icons/faChevronRight';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';
import { RoutePageManifest } from '../manifest';

const DivWithBackgroundImg = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-extra/div-with-background-img/DivWithBackgroundImg.vue'),
);

const Button = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/button/Button.vue'),
);

const Title = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/title/Title.vue'),
);
const Icon = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/icon/Icon.vue'));

const Paragraph = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/paragraph/Paragraph.vue'),
);

const Container = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/container/Container.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style scoped>
.overlay {
  border-radius: inherit;
}
</style>
