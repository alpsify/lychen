<template>
  <LychenContainer class="flex flex-col gap-4 items-center md:py-20">
    <LychenTitle variant="h2">{{ t(`section.needs.title`) }}</LychenTitle>
    <LychenParagraph
      variant="website-highlight"
      class="text-center md:w-3/5"
      >{{ t(`section.needs.description`) }}</LychenParagraph
    >
    <div class="flex flex-col lg:w-2/3 m-auto gap-6">
      <div
        class="flex flex-col md:grid md:grid-cols-[100px_1fr_min-content] gap-4 bg-surface-container text-on-surface-container rounded-lg items-center p-6"
      >
        <div class="flex items-center justify-center">
          <img
            loading="lazy"
            icon="server"
            class="rounded-full w-1/2 md:w-full"
            :src="NathanDePachtereImage"
            alt="Portrait de Nathan De Pachtere"
          />
        </div>
        <div class="flex flex-col justify-center md:items-start items-center gap-2">
          <LychenTitle variant="h3">{{
            t(`section.needs.contributors.nathan_de_pachtere.name`)
          }}</LychenTitle>
          <p class="text-center md:text-left opacity-80">
            {{ t(`section.needs.contributors.nathan_de_pachtere.description`) }}
          </p>
          <a
            href="https://www.linkedin.com/in/nathandepachtere/"
            target="_blank"
            class="underline"
            ><LychenIcon
              icon="linkedin"
              fashion="fab"
              class="mr-2"
            />LinkedIn</a
          >
        </div>
        <div class="flex flex-col gap-4 border-l-2 border-tertiary p-2">
          <LychenBadge
            variant="tertiary"
            class="self-start"
            >{{ t(`section.needs.need_backers`) }}</LychenBadge
          >
          <a
            href="https://ko-fi.com/nathandepachtere"
            target="_blank"
          >
            <LychenRainbowBox class="flex flex-row text-surface gap-2 rounded-full no-wrap">
              <LychenIcon
                icon="coffee"
                class="fa-lg"
              />{{ t(`section.needs.contributors.nathan_de_pachtere.call_to_action_kofi`) }}
            </LychenRainbowBox>
          </a>

          <a
            href="https://github.com/sponsors/nathan-de-pachtere"
            target="_blank"
          >
            <LychenRainbowBox class="flex flex-row text-surface gap-2 rounded-full no-wrap">
              <LychenIcon
                icon="github"
                fashion="fab"
                class="fa-lg"
              />{{ t(`section.needs.contributors.nathan_de_pachtere.call_to_action_github`) }}
            </LychenRainbowBox>
          </a>
        </div>
      </div>
      <div
        class="flex flex-col md:grid md:grid-cols-[100px_1fr_min-content] gap-4 bg-surface-container text-on-surface-container rounded-lg items-center p-6"
      >
        <div class="flex items-center justify-center">
          <img
            loading="lazy"
            icon="server"
            class="rounded-full w-1/2 md:w-full"
            :src="JenniferGeoffroyImage"
            alt="Portrait de Jennifer Geoffroy"
          />
        </div>
        <div class="flex flex-col justify-center md:items-start items-center gap-2">
          <LychenTitle variant="h3">{{
            t(`section.needs.contributors.jennifer_geoffroy.name`)
          }}</LychenTitle>
          <p class="text-center md:text-left opacity-80">
            {{ t(`section.needs.contributors.jennifer_geoffroy.description`) }}
          </p>
          <a
            href="https://www.linkedin.com/in/jennifer-geoffroy/"
            target="_blank"
            class="underline"
            ><LychenIcon
              icon="linkedin"
              fashion="fab"
              class="mr-2"
            />LinkedIn</a
          >
        </div>
        <div class="flex flex-col gap-4 border-l-2 border-tertiary p-2">
          <LychenBadge
            variant="tertiary"
            class="self-start"
            >{{ t(`section.needs.need_backers`) }}</LychenBadge
          >
          <a
            href="https://ko-fi.com/jennifergeoffroy"
            target="_blank"
          >
            <LychenRainbowBox class="flex flex-row text-surface gap-2 rounded-full no-wrap">
              <LychenIcon
                icon="coffee"
                class="fa-lg"
              />{{ t(`section.needs.contributors.jennifer_geoffroy.call_to_action_kofi`) }}
            </LychenRainbowBox>
          </a>
        </div>
      </div>
      <div
        class="flex flex-col md:grid md:grid-cols-[100px_1fr_min-content] gap-4 bg-surface-container text-on-surface-container rounded-lg items-center p-4"
      >
        <div class="flex items-center justify-center">
          <LychenIcon
            icon="server"
            class="fa-xl"
          />
        </div>
        <div class="flex flex-col justify-center md:items-start items-center gap-2">
          <LychenTitle variant="h3">{{ t(`section.needs.server.title`) }}</LychenTitle>
          <p class="text-center md:text-left opacity-80">
            {{ t(`section.needs.server.description`) }}
          </p>
        </div>
        <div class="flex-col gap-2 border-l-2 border-green-500 p-2">
          <LychenBadge class="bg-green-500 whitespace-nowrap">{{
            t(`section.needs.fully_backed`)
          }}</LychenBadge>
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
                >alpsify
                <LychenIcon
                  icon="arrow-up-right"
                  class="opacity-50"
              /></a>
            </li>
            <li>
              <small class="opacity-40">2024</small>
              <a
                :href="LINK.Alpsify"
                class="flex gap-2 items-center"
                target="_blank"
                >alpsify
                <LychenIcon
                  icon="arrow-up-right"
                  class="opacity-50"
              /></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </LychenContainer>
</template>

<script setup lang="ts">
import NathanDePachtereImage from './assets/NathanDePachtere.webp';
import JenniferGeoffroyImage from './assets/JenniferGeoffroy.webp';
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import { LINK } from '@lychen/util-constants/Link';

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));
const LychenBadge = defineAsyncComponent(
  () => import('@lychen/ui-components/badge/LychenBadge.vue'),
);

const LychenRainbowBox = defineAsyncComponent(
  () => import('@lychen/ui-components/rainbow-box/LychenRainbowBox.vue'),
);

const LychenContainer = defineAsyncComponent(
  () => import('@lychen/ui-components/container/LychenContainer.vue'),
);

const LychenTitle = defineAsyncComponent(
  () => import('@lychen/ui-components/title/LychenTitle.vue'),
);

const LychenParagraph = defineAsyncComponent(
  () => import('@lychen/ui-components/paragraph/LychenParagraph.vue'),
);
const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
