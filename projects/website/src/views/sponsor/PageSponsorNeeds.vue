<template>
  <Container class="flex flex-col gap-4 items-center md:py-20">
    <Title variant="h2">{{ t(`section.needs.title`) }}</Title>
    <Paragraph
      variant="website-highlight"
      class="text-center md:w-3/5"
      >{{ t(`section.needs.description`) }}</Paragraph
    >
    <div class="flex flex-col lg:w-2/3 m-auto gap-6">
      <div
        class="flex flex-col md:grid md:grid-cols-[100px_1fr_min-content] gap-4 bg-surface-container text-on-surface-container rounded-lg items-center p-4"
      >
        <div class="flex items-center justify-center">
          <IconServer />
        </div>
        <div class="flex flex-col justify-center md:items-start items-center gap-2">
          <Title variant="h3">{{ t(`section.needs.server.title`) }}</Title>
          <p class="text-center md:text-left opacity-80">
            {{ t(`section.needs.server.description`) }}
          </p>
        </div>
        <div class="flex-col gap-2 border-l-2 border-green-500 p-2">
          <Badge class="bg-green-500 whitespace-nowrap">{{
            t(`section.needs.fully_backed`)
          }}</Badge>
          <p
            variant="h6"
            class="opacity-60 whitespace-nowrap"
          >
            {{ t(`section.needs.backed_by`) }}
          </p>
          <ul>
            <li>
              <small class="opacity-40">2025</small>
              <a
                :href="LINK.Alpsify"
                class="flex gap-2 items-center"
                target="_blank"
                >alpsify <IconArrowUpRight class="opacity-50"
              /></a>
            </li>
            <li>
              <small class="opacity-40">2024</small>
              <a
                :href="LINK.Alpsify"
                class="flex gap-2 items-center"
                target="_blank"
                >alpsify <IconArrowUpRight class="opacity-50"
              /></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </Container>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { LINK } from '@lychen/typescript-constants/Link';
import IconServer from '@lychen/vue-icons/IconServer.vue';
import IconArrowUpRight from '@lychen/vue-icons/IconArrowUpRight.vue';

const Badge = defineAsyncComponent(() => import('@lychen/vue-components-core/badge/Badge.vue'));

const Container = defineAsyncComponent(
  () => import('@lychen/vue-components-website/container/Container.vue'),
);

const Title = defineAsyncComponent(() => import('@lychen/vue-components-website/title/Title.vue'));

const Paragraph = defineAsyncComponent(
  () => import('@lychen/vue-components-website/paragraph/Paragraph.vue'),
);
const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
