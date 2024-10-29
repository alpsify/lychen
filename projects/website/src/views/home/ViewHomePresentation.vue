<template>
  <LychenContainer class="flex flex-col-reverse lg:flex-row gap-4 items-center">
    <div class="basis-1/2 flex flex-col gap-2">
      <LychenTitle variant="h2">{{ t('presentation.title') }}</LychenTitle>
      <LychenParagraph variant="website-default">{{ t('presentation.description') }}</LychenParagraph>
      <LychenParagraph
        variant="website-default"
        class="opacity-60"
      >{{ t('presentation.second_description') }}
      </LychenParagraph
      >
    </div>
    <div class="basis-1/2">
      <img
        src="https://images.pexels.com/photos/1072824/pexels-photo-1072824.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
        class="rounded-lg"/>
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import {defineAsyncComponent} from 'vue';

import {useTranslations} from './i18n';

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);
const LychenTitle = defineAsyncComponent(() => import('@lychen/ui-components/title/LychenTitle.vue'));
const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);

const {t} = useTranslations();
</script>
