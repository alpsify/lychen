<template>
  <div class="z-50 flex w-full">
    <div class="text-on-surface-container flex flex-row gap-4 rounded-full w-full md:container">
      <a
        ref="lychenLogo"
        href="https://lychen.fr"
        target="_blank"
        class="size-[56px] flex flex-row items-center justify-center backdrop-blur-lg p-4 rounded-3xl bg-surface-container/70 transition-all duration-500 ease-in-out group hover:w-36 hover:text-on-primary-container"
        aria-label="lychen.fr"
      >
        <div class="flex flex-col items-end">
          <div class="flex flex-row items-center">
            <LogoLychenIconOnly class="h-[1lh]" />
            <LogoLychenTextOnly class="hidden group-hover:flex" />
          </div>
          <small
            class="flex-row gap-1 hidden group-hover:flex items-center text-xs motion-blur-in-md motion-duration-[1s] motion-ease-spring-smooth"
            >lychen.fr<Icon :icon="faArrowUpRight"
          /></small>
        </div>
      </a>

      <div
        class="relative backdrop text-on-surface-container flex flex-row items-stretch gap-4 px-6 py-2 rounded-full shadow-lg grow justify-between"
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
          <SelectLanguage />
          <ToggleColorScheme />
          <a
            :href="SOCIAL_LINK.GitHub"
            target="_blank"
            aria-label="GitHub"
          >
            <Icon :icon="faGithub" />
          </a>
          <ButtonTallyPreregister class="hidden md:flex" />
          <div class="flex flex-row items-center lg:hidden">
            <Sheet
              v-model:open="isOpen"
              side="right"
            >
              <SheetTrigger as-child>
                <Icon
                  :icon="faBarsStaggered"
                  class="cursor-pointer"
                />
              </SheetTrigger>
              <SheetContent
                class="bg-surface-container/70 text-on-surface-container w-full backdrop-blur-lg flex flex-col gap-4"
              >
                <template #header>
                  <div class="flex flex-col gap-1">
                    <ApplicationTitle :value="applicationName" />
                    <p>by Lychen</p>
                  </div></template
                >
                <slot name="mobile"></slot>
                <ButtonTallyPreregister />
              </SheetContent>
            </Sheet>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { defineAsyncComponent, provide, ref } from 'vue';
import { faBarsStaggered } from '@fortawesome/pro-light-svg-icons/faBarsStaggered';
import { faGithub } from '@fortawesome/free-brands-svg-icons/faGithub';
import { faArrowUpRight } from '@fortawesome/pro-light-svg-icons/faArrowUpRight';
import { SOCIAL_LINK } from '@lychen/typescript-constants/Social';

import { type LayoutWebsiteApplicationNavigationProps } from '.';

import ToggleColorScheme from '@lychen/vue-color-scheme/components/ToggleColorScheme.vue';

const ButtonTallyPreregister = defineAsyncComponent(
  () =>
    import('@lychen/vue-components-website/button-tally-preregister/ButtonTallyPreregister.vue'),
);
const LogoLychenIconOnly = defineAsyncComponent(
  () => import('@lychen/vue-components-extra/logo-lychen/LogoLychenIconOnly.vue'),
);

const LogoLychenTextOnly = defineAsyncComponent(
  () => import('@lychen/vue-components-extra/logo-lychen/LogoLychenTextOnly.vue'),
);

const ApplicationTitle = defineAsyncComponent(
  () => import('@lychen/vue-applications/components/ApplicationTitle.vue'),
);
const ApplicationBadgeState = defineAsyncComponent(
  () => import('@lychen/vue-applications/components/ApplicationBadgeState.vue'),
);

const SheetTrigger = defineAsyncComponent(
  () => import('@lychen/vue-components-core/sheet/SheetTrigger.vue'),
);

const Sheet = defineAsyncComponent(() => import('@lychen/vue-components-core/sheet/Sheet.vue'));

const SheetContent = defineAsyncComponent(
  () => import('@lychen/vue-components-core/sheet/SheetContent.vue'),
);

const SelectLanguage = defineAsyncComponent(
  () => import('@lychen/vue-i18n/components/select-language/SelectLanguage.vue'),
);

const Icon = defineAsyncComponent(() => import('@lychen/vue-components-core/icon/Icon.vue'));

const isOpen = ref<boolean>(false);

provide('mobileMenuIsOpen', isOpen);

const lychenLogo = ref();

defineProps<LayoutWebsiteApplicationNavigationProps>();
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
  backdrop-filter: blur(var(--blur-lg));
  z-index: -1;
  background-color: oklch(from var(--color-surface-container) l c h / calc(alpha - 0.3));
  border-radius: var(--radius-3xl);
}
</style>
