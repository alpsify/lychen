<template>
  <Container class="flex flex-col items-stretch justify-center">
    <RouterLink :to="ROUTE_MANIFEST">
      <DivWithBackgroundImg
        :background-image="ossUrl"
        overlay
        overlay-class="bg-on-surface dark:bg-surface opacity-50"
        class="group rounded-3xl p-8 py-24"
      >
        <div
          class="text-surface dark:text-on-surface relative z-10 flex flex-col items-center gap-8"
        >
          <Title
            variant="h2"
            class="text-center md:basis-2/5"
            >{{ t('oss.title') }}</Title
          >
          <Paragraph
            variant="website-highlight"
            class="text-center opacity-90 md:w-3/5"
            >{{ t('oss.description') }}</Paragraph
          >
          <Button
            variant="ghost"
            class="group-hover:bg-primary group-hover:text-on-primary flex flex-row gap-2"
            >{{ t('oss.button.label') }} <IconChevronRight
          /></Button>
        </div>
      </DivWithBackgroundImg>
    </RouterLink>
  </Container>
</template>

<script setup lang="ts">
import ossUrl from './assets/oss.webp';
import { defineAsyncComponent } from 'vue';

import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { ROUTE_MANIFEST } from '../manifest';
import IconChevronRight from '@lychen/vue-icons/IconChevronRight.vue';

const DivWithBackgroundImg = defineAsyncComponent(
  () => import('@lychen/vue-components-extra/div-with-background-img/DivWithBackgroundImg.vue'),
);

const Button = defineAsyncComponent(() => import('@lychen/vue-components-core/button/Button.vue'));

const Title = defineAsyncComponent(() => import('@lychen/vue-components-website/title/Title.vue'));

const Paragraph = defineAsyncComponent(
  () => import('@lychen/vue-components-website/paragraph/Paragraph.vue'),
);

const Container = defineAsyncComponent(
  () => import('@lychen/vue-components-website/container/Container.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style scoped>
.overlay {
  border-radius: inherit;
}
</style>
