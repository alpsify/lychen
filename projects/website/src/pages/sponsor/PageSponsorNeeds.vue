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
        class="flex flex-col md:grid md:grid-cols-[100px_1fr_min-content] gap-4 bg-surface-container text-on-surface-container rounded-lg items-center p-6"
      >
        <div class="flex items-center justify-center">
          <img
            loading="lazy"
            class="rounded-full w-1/2 md:w-full"
            :src="NathanDePachtereImage"
            alt="Portrait de Nathan De Pachtere"
          />
        </div>
        <div class="flex flex-col justify-center md:items-start items-center gap-2">
          <Title variant="h3">{{ t(`section.needs.contributors.nathan_de_pachtere.name`) }}</Title>
          <p class="text-center md:text-left opacity-80">
            {{ t(`section.needs.contributors.nathan_de_pachtere.description`) }}
          </p>
          <a
            href="https://www.linkedin.com/in/nathandepachtere/"
            target="_blank"
            class="underline"
            ><Icon
              :icon="faLinkedin"
              class="mr-2"
            />LinkedIn</a
          >
        </div>
        <div class="flex flex-col gap-4 border-l-2 border-tertiary p-2">
          <Badge
            variant="tertiary"
            class="self-start"
            >{{ t(`section.needs.need_backers`) }}</Badge
          >
          <a
            href="https://ko-fi.com/nathandepachtere"
            target="_blank"
          >
            <RainbowBox class="flex flex-row gap-2 no-wrap">
              <Icon
                :icon="faCoffee"
                class="fa-lg"
              />{{ t(`section.needs.contributors.nathan_de_pachtere.call_to_action_kofi`) }}
            </RainbowBox>
          </a>

          <a
            href="https://github.com/sponsors/nathan-de-pachtere"
            target="_blank"
          >
            <RainbowBox class="flex flex-row gap-2 no-wrap">
              <Icon
                :icon="faGithub"
                class="fa-lg"
              />{{ t(`section.needs.contributors.nathan_de_pachtere.call_to_action_github`) }}
            </RainbowBox>
          </a>
        </div>
      </div>
      <div
        class="flex flex-col md:grid md:grid-cols-[100px_1fr_min-content] gap-4 bg-surface-container text-on-surface-container rounded-lg items-center p-6"
      >
        <div class="flex items-center justify-center">
          <img
            loading="lazy"
            class="rounded-full w-1/2 md:w-full"
            :src="JenniferGeoffroyImage"
            alt="Portrait de Jennifer Geoffroy"
          />
        </div>
        <div class="flex flex-col justify-center md:items-start items-center gap-2">
          <Title variant="h3">{{ t(`section.needs.contributors.jennifer_geoffroy.name`) }}</Title>
          <p class="text-center md:text-left opacity-80">
            {{ t(`section.needs.contributors.jennifer_geoffroy.description`) }}
          </p>
          <a
            href="https://www.linkedin.com/in/jennifer-geoffroy/"
            target="_blank"
            class="underline"
            ><Icon
              :icon="faLinkedin"
              class="mr-2"
            />LinkedIn</a
          >
        </div>
        <div class="flex flex-col gap-4 border-l-2 border-tertiary p-2">
          <Badge
            variant="tertiary"
            class="self-start"
            >{{ t(`section.needs.need_backers`) }}</Badge
          >
          <a
            href="https://ko-fi.com/jennifergeoffroy"
            target="_blank"
          >
            <RainbowBox class="flex flex-row gap-2 no-wrap">
              <Icon
                :icon="faCoffee"
                class="fa-lg"
              />{{ t(`section.needs.contributors.jennifer_geoffroy.call_to_action_kofi`) }}
            </RainbowBox>
          </a>
        </div>
      </div>
      <div
        class="flex flex-col md:grid md:grid-cols-[100px_1fr_min-content] gap-4 bg-surface-container text-on-surface-container rounded-lg items-center p-4"
      >
        <div class="flex items-center justify-center">
          <Icon
            :icon="faServer"
            class="fa-xl"
          />
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
                >alpsify
                <Icon
                  :icon="faArrowUpRight"
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
                <Icon
                  :icon="faArrowUpRight"
                  class="opacity-50"
              /></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </Container>
</template>

<script setup lang="ts">
import NathanDePachtereImage from './assets/NathanDePachtere.webp';
import JenniferGeoffroyImage from './assets/JenniferGeoffroy.webp';
import { defineAsyncComponent } from 'vue';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';
import { LINK } from '@lychen/typescript-constants/Link';
import { faGithub } from '@fortawesome/free-brands-svg-icons/faGithub';
import { faLinkedin } from '@fortawesome/free-brands-svg-icons/faLinkedin';
import { faCoffee } from '@fortawesome/pro-light-svg-icons/faCoffee';
import { faArrowUpRight } from '@fortawesome/pro-light-svg-icons/faArrowUpRight';
import { faServer } from '@fortawesome/pro-light-svg-icons/faServer';

const Icon = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/icon/Icon.vue'));
const Badge = defineAsyncComponent(() => import('@lychen/vue-ui-components-core/badge/Badge.vue'));

const RainbowBox = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-extra/rainbow-box/RainbowBox.vue'),
);

const Container = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/container/Container.vue'),
);

const Title = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/title/Title.vue'),
);

const Paragraph = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-website/paragraph/Paragraph.vue'),
);
const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>
