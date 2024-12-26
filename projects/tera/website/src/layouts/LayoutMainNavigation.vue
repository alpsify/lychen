<template>
  <div class="flex w-full flex-row items-stretch justify-between gap-4">
    <RouterLink
      :to="RoutePageHome"
      class="flex flex-row items-stretch"
    >
      <LychenLogo class="logo-hover-effect"
    /></RouterLink>
    <div class="flex flex-row items-stretch gap-2"></div>

    <div class="flex flex-row items-center gap-4">
      <LychenThemeSwitcher />
      <a
        href="https://github.com/alpsify/lychen"
        target="_blank"
      >
        <LychenIcon
          icon="github"
          :fashion="LYCHEN_ICON_FASHION.Brands"
        />
      </a>
      <a
        href="https://discord.gg/FSMbXt5gr4"
        target="_blank"
      >
        <LychenIcon
          icon="discord"
          :fashion="LYCHEN_ICON_FASHION.Brands"
        />
      </a>
      <a
        href="https://tally.so/r/w5EYdZ"
        target="_blank"
        class="hidden md:flex"
      >
        <LychenButton
          variant="default"
          size="sm"
          class="gap-2"
          data-umami-event="Clicks on pre-register"
          >{{ t(`navigation.preregister`) }} <LychenIcon icon="rocket-launch" /></LychenButton
      ></a>
    </div>
  </div>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { RoutePageHome } from '@pages/home';

import {
  TRANSLATION_KEY as GLOBAL_TRANSLATION_KEY,
  messages as globalMessages,
} from '@lychen/ui-i18n/global';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

import { LYCHEN_ICON_FASHION } from '@lychen/ui-components/icon';
import LychenButton from '@lychen/ui-components/button/LychenButton.vue';

const LychenThemeSwitcher = defineAsyncComponent(
  () => import('@lychen/ui-components/theme-switcher/LychenThemeSwitcher.vue'),
);

const LychenLogo = defineAsyncComponent(() => import('@lychen/ui-components/logo/LychenLogo.vue'));
const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const { t: tGlobal } = useI18nExtended({
  messages: globalMessages,
  rootKey: GLOBAL_TRANSLATION_KEY,
  prefixed: true,
});
const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
