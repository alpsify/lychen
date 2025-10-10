<template>
  <Container class="flex flex-col items-stretch justify-center">
    <a
      :href="LINK.TallyPreregisterForm"
      target="_blank"
    >
      <DivWithBackgroundImg
        :background-image="imageUrl"
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
            >{{ t('preregister.title') }}</Title
          >
          <Paragraph
            variant="website-highlight"
            class="opacity-90 md:w-3/5 text-center"
            >{{ t('preregister.description') }}</Paragraph
          >
          <Button
            variant="ghost"
            class="flex flex-row gap-2 group-hover:bg-primary group-hover:text-on-primary"
            >{{ t('preregister.button.label') }} <IconChevronRight
          /></Button>
        </div>
      </DivWithBackgroundImg>
    </a>
  </Container>
</template>

<script setup lang="ts">
import imageUrl from './assets/preregister.webp';
import { defineAsyncComponent } from 'vue';
import IconChevronRight from '@lychen/vue-icons/IconChevronRight.vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { LINK } from '@lychen/typescript-constants/Link';

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
