<template>
  <div class="z-50 flex w-full">
    <div class="text-surface-container-on flex flex-row gap-4 rounded-full w-full md:container">
      <a
        ref="lychenLogo"
        href="https://lychen.fr"
        target="_blank"
        class="size-[56px] flex flex-row items-center justify-center backdrop-blur-lg rounded-full bg-surface-container/70 transition-all ease-in-out duration-500"
        :class="isHovered ? 'h-[56px] w-auto p-4' : 'size-[56px]'"
      >
        <LychenLogo
          class="h-10"
          :no-text="!isHovered"
      /></a>

      <div
        class="relative backdrop text-surface-container-on flex flex-row items-stretch gap-4 px-6 py-2 rounded-full shadow-lg grow justify-between"
      >
        <div class="flex flex-row items-center justify-start gap-2">
          <RouterLink
            :to="routeHome"
            class="flex flex-row items-center gap-1 justify-start"
          >
            <ApplicationTitle :value="applicationName" />
          </RouterLink>
          <ApplicationBadgeState
            :state="applicationState"
            class="hidden md:flex"
          ></ApplicationBadgeState>
        </div>

        <div class="flex flex-row items-stretch gap-2">
          <slot></slot>
        </div>

        <div class="flex flex-row items-center gap-4">
          <LychenThemeSwitcher />
          <a
            :href="SOCIAL_LINK.GitHub"
            target="_blank"
          >
            <LychenIcon
              icon="github"
              :fashion="LYCHEN_ICON_FASHION.Brands"
            />
          </a>
          <WebsiteButtonTallyPreregister class="hidden md:flex" />
          <div class="flex flex-row items-center lg:hidden">
            <LychenSheet
              v-model:open="isOpen"
              side="right"
            >
              <LychenSheetTrigger as-child>
                <LychenIcon
                  icon="bars-staggered"
                  class="cursor-pointer"
                />
              </LychenSheetTrigger>
              <LychenSheetContent
                class="bg-surface-container/70 text-surface-container-on w-full backdrop-blur-lg flex flex-col gap-4"
              >
                <template #header>
                  <div class="flex flex-col gap-1">
                    <ApplicationTitle :value="applicationName" />
                    <p>by Lychen</p>
                  </div></template
                >
                <slot name="mobile"></slot>
                <WebsiteButtonTallyPreregister />
              </LychenSheetContent>
            </LychenSheet>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import LychenLogo from '@lychen/ui-components/logo/LychenLogo.vue';
import { defineAsyncComponent, provide, ref } from 'vue';
import { useElementHover } from '@vueuse/core';

import { LYCHEN_ICON_FASHION } from '@lychen/ui-components/icon';
import { SOCIAL_LINK } from '@lychen/util-constants/Social';

import ApplicationTitle from '@lychen/applications-ui-components/ApplicationTitle.vue';
import ApplicationBadgeState from '@lychen/applications-ui-components/ApplicationBadgeState.vue';
import { LayoutApplicationNavigationProps } from '.';
import WebsiteButtonTallyPreregister from '@lychen/website-ui-components/buttons/tally-preregister/WebsiteButtonTallyPreregister.vue';

const LychenSheetTrigger = defineAsyncComponent(
  () => import('@lychen/ui-components/sheet/LychenSheetTrigger.vue'),
);

const LychenThemeSwitcher = defineAsyncComponent(
  () => import('@lychen/ui-components/theme-switcher/LychenThemeSwitcher.vue'),
);

const LychenSheet = defineAsyncComponent(
  () => import('@lychen/ui-components/sheet/LychenSheet.vue'),
);

const LychenSheetContent = defineAsyncComponent(
  () => import('@lychen/ui-components/sheet/LychenSheetContent.vue'),
);

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const isOpen = ref<boolean>(false);

provide('mobileMenuIsOpen', isOpen);

const lychenLogo = ref();
const isHovered = useElementHover(lychenLogo);

defineProps<LayoutApplicationNavigationProps>();
</script>

<style scoped>
.backdrop::before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  bottom: 0;
  left: 0;
  backdrop-filter: blur(theme('backdropBlur.lg'));
  z-index: -1;
  background-color: rgb(var(--color-surface-container) / 0.7);
  border-radius: theme('borderRadius.full');
}
</style>
