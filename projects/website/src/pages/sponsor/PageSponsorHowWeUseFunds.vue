<template>
  <Container class="flex flex-col gap-4 lg:w-1/2 md:py-20">
    <Title variant="h2">{{ t(`section.how_we_use_funds.title`) }}</Title>
    <Paragraph variant="website-highlight">{{
      t(`section.how_we_use_funds.description`)
    }}</Paragraph>
    <ul>
      <li
        v-for="(pointKey, index) in Object.keys(messages['fr-FR'].section.how_we_use_funds.points)"
        :key="index"
      >
        <Icon
          :icon="faArrowRight"
          class="mr-2"
        />{{ t(`section.how_we_use_funds.points.${pointKey}.title`) }}
      </li>
    </ul>
  </Container>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { faArrowRight } from '@fortawesome/pro-light-svg-icons/faArrowRight';

const Icon = defineAsyncComponent(() => import('@lychen/vue-components-core/icon/Icon.vue'));

const Container = defineAsyncComponent(
  () => import('@lychen/vue-components-website/container/Container.vue'),
);

const Title = defineAsyncComponent(() => import('@lychen/vue-components-website/title/Title.vue'));

const Paragraph = defineAsyncComponent(
  () => import('@lychen/vue-components-website/paragraph/Paragraph.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
