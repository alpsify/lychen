<template>
  <Container class="flex flex-col xl:flex-row items-center gap-8 xl:mb-20">
    <div class="md:basis-1/3 flex flex-col gap-6">
      <Title class="text-5xl md:text-8xl"
        >{{ t('intro.title.1') }} <br />
        {{ t('intro.title.2') }} <br />

        <TextHighlight
          class="bg-gradient-to-r from-indigo-300 to-purple-300 rounded-lg md:text-8xl"
          text-end-color="var(--color-surface)"
          >{{ t('intro.title.3') }}</TextHighlight
        ></Title
      >
      <Title
        variant="h3"
        class="opacity-80"
        >{{ t('intro.sub_title') }}</Title
      >
      <Paragraph variant="website-highlight">{{ t('intro.highlight_text') }}</Paragraph>
    </div>

    <div class="relative flex flex-col items-center basis-2/3 gap-8 rounded-2xl">
      <img
        :src="ImageUrl"
        class="rounded-3xl"
      />
      <div
        class="w-8/10 md:w-auto md:absolute lg:left-1/5 lg:-bottom-1/3 xl:-bottom-3/5 2xl:-bottom-2/5 flex flex-col gap-4 items-center -mt-40 z-30"
      >
        <div
          class="flex flex-col items-center backdrop-blur-lg px-4 py-2 bg-surface-container/50 text-on-surface-container rounded-xl"
        >
          <p class="text-md font-medium">{{ t('intro.inspire_others') }}</p>
          <Icon :icon="faChevronDown" />
        </div>
        <div
          class="self-stretch md:self-center rounded-xl p-6 bg-surface-container/80 backdrop-blur-lg md:w-[300px] flex flex-col gap-4 shadow-2xl shadow-primary/50 dark:shadow-primary-container/50 outline outline-offset-4 outline-surface/50"
        >
          <div class="flex flex-row justify-between items-center gap-6">
            <img
              :src="DudeImageUrl"
              class="rounded-full h-8"
            />
            <p class="text-md md:text-xl font-bold">Kyan Mateouf</p>
          </div>
          <div class="flex flex-row justify-center gap-4 items-center">
            <img
              :src="RewardsImageUrl"
              class="h-6"
            />
            <img
              :src="AwardImageUrl"
              class="h-8 fa-beat"
            />
            <img
              :src="BadgeImageUrl"
              class="h-6"
            />
          </div>
          <div class="flex flex-col gap-2">
            <div class="bg-gray-300 w-full h-3 rounded-md"></div>
            <div class="bg-gray-300 w-full h-3 rounded-md"></div>
            <div class="bg-gray-300 w-1/2 h-3 rounded-md"></div>
          </div>
          <p class="text-sm">{{ t('intro.actions') }}</p>
          <div class="flex flex-col gap-2">
            <div class="bg-gray-300 w-full h-3 rounded-md"></div>
            <div class="bg-gray-300 w-full h-3 rounded-md"></div>
            <div class="bg-gray-300 w-full h-3 rounded-md"></div>
          </div>
          <p class="text-sm">{{ t('intro.mesh') }}</p>
          <div class="grid grid-cols-2 gap-2">
            <div class="bg-gray-300 w-full h-10 rounded-md"></div>
            <div class="bg-gray-300 w-full h-10 rounded-md"></div>
            <div class="bg-gray-300 w-full h-10 rounded-md"></div>
            <div class="bg-gray-300 w-full h-10 rounded-md"></div>
          </div>
        </div>
      </div>

      <div
        class="md:absolute lg:top-8 lg:-right-8 md:w-2/3 flex flex-col md:flex-row items-center gap-4"
      >
        <div
          class="flex flex-row items-center backdrop-blur-lg px-4 py-2 bg-surface-container/50 text-on-surface-container rounded-xl"
        >
          <p class="text-md font-medium">{{ t('intro.win_success') }}</p>

          <Icon
            :icon="faChevronRight"
            class="w-8"
          />
        </div>
        <div
          class="flex flex-col md:flex-row gap-4 bg-surface-container/80 backdrop-blur-lg p-6 rounded-md shadow-2xl shadow-primary/50 dark:shadow-primary-container/50 justify-center items-center"
        >
          <img
            :src="AwardImageUrl"
            class="w-20"
          />
          <div class="text-center md:text-left">
            <p class="text-lg font-bold">{{ t('intro.fake_success.title') }}</p>
            <p>
              {{ t('intro.fake_success.description') }}
            </p>
          </div>
        </div>
      </div>

      <div
        class="hidden md:flex md:absolute lg:bottom-20 lg:right-10 bg-surface-container/80 backdrop-blur-lg shadow-xl shadow-primary/50 dark:shadow-primary-container/50 p-6 rounded-xl flex-col gap-2 justify-center items-center"
      >
        <img
          :src="CompanyImageUrl"
          class="rounded-full h-16 bg-on-surface"
        />
        <p class="font-lexend font-bold text-lg">alpsify</p>
        <div class="flex flex-row justify-center gap-1 items-center text-orange-400">
          <Icon :icon="faStar" />
          <Icon :icon="faStar" />
          <Icon :icon="faStar" />
        </div>
        <div class="flex flex-col gap-2 self-stretch justify-center items-center">
          <div class="bg-gray-300 w-full h-3 rounded-md"></div>
          <div class="bg-gray-300 w-full h-3 rounded-md"></div>
          <div class="bg-gray-300 w-1/2 h-3 rounded-md"></div>
        </div>
      </div>
    </div>
  </Container>
</template>

<script lang="ts" setup>
import ImageUrl from './assets/WomanJumping.webp';
import DudeImageUrl from './assets/dude.jpg';
import AwardImageUrl from './assets/award.png';
import RewardsImageUrl from './assets/rewards.png';
import BadgeImageUrl from './assets/badge.png';
import CompanyImageUrl from './assets/CompanyLogo.png';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { faChevronRight } from '@fortawesome/pro-light-svg-icons/faChevronRight';

import { messages, TRANSLATION_KEY } from './i18n';
import Container from '@lychen/vue-components-website/container/Container.vue';
import Title from '@lychen/vue-components-website/title/Title.vue';
import Paragraph from '@lychen/vue-components-website/paragraph/Paragraph.vue';
import { TextHighlight } from '@lychen/vue-components-extra/text-highlight';
import Icon from '@lychen/vue-components-core/icon/Icon.vue';
import { faChevronDown } from '@fortawesome/pro-light-svg-icons/faChevronDown';
import { faStar } from '@fortawesome/pro-light-svg-icons/faStar';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
