<template>
  <div class="flex w-full flex-row items-stretch justify-between gap-4">
    <RouterLink
      :to="{ name: RoutePageHome.name }"
      class="flex flex-row items-stretch"
    >
      <LychenLogo
    /></RouterLink>
    <div class="flex flex-row items-stretch gap-2">
      <LychenNavigationMenu class="hidden lg:flex">
        <LychenNavigationMenuList>
          <LychenNavigationMenuItem>
            <LychenNavigationMenuTrigger>{{
              t(`${TRANSLATION_KEY}.navigation.app.title`)
            }}</LychenNavigationMenuTrigger>
            <LychenNavigationMenuContent
              class="bg-surface-container/70 text-surface-container-on backdrop-blur-lg"
            >
              <div class="flex flex-col items-stretch gap-2 p-6">
                <div
                  class="flex flex-row items-center gap-4 rounded-xl bg-surface-container-highest p-4 text-surface-container-highest-on"
                >
                  <LychenIcon icon="megaphone" />
                  <div class="flex flex-col gap-0">
                    <p class="text-sm">
                      {{ t(`${TRANSLATION_KEY}.navigation.app.menu.disclaimer.paragraph`) }}

                      <a
                        class="text-sm underline"
                        :href="`mailto:${t(`${GLOBAL_TRANSLATION_KEY}.email.contact`)}`"
                        >{{ t(`${GLOBAL_TRANSLATION_KEY}.email.contact`) }}</a
                      >
                    </p>
                  </div>
                </div>
                <ul class="grid gap-3 md:w-[600px] md:grid-cols-2 lg:w-[800px] lg:grid-cols-3">
                  <li
                    v-for="application in applicationsList"
                    :key="application.title"
                  >
                    <div
                      :href="application.link"
                      target="_blank"
                      class="cursor-pointer h-full select-none flex flex-col gap-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-surface-container-high hover:text-surface-container-high-on focus:bg-surface-container-high focus:text-surface-container-high-on"
                    >
                      <p
                        class="text-md font-black font-lexend leading-none tracking-wide lowercase"
                      >
                        {{ application.title }}
                      </p>
                      <p class="line-clamp-3 text-xs leading-snug text-surface-container-on/70">
                        {{ application.description }}
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </LychenNavigationMenuContent>
          </LychenNavigationMenuItem>

          <LychenNavigationMenuItem>
            <LychenNavigationMenuTrigger>{{
              t(`${TRANSLATION_KEY}.navigation.resources.title`)
            }}</LychenNavigationMenuTrigger>
            <LychenNavigationMenuContent
              class="bg-surface-container/70 text-surface-container-on backdrop-blur-lg"
            >
              <div class="flex flex-row gap-4 p-6 md:w-[400px]">
                <div class="flex flex-col justify-start items-stretch gap-2 basis-1/2">
                  <a
                    v-for="resourceMenu in resourcesMenuList"
                    :key="resourceMenu.title"
                    :href="resourceMenu.link"
                    target="_blank"
                    class="cursor-pointer select-none flex flex-col gap-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-surface-container-high hover:text-surface-container-high-on focus:bg-surface-container-high focus:text-surface-container-high-on"
                  >
                    <p class="text-md font-black font-lexend leading-none tracking-wide">
                      {{ resourceMenu.title }}
                    </p>
                    <p class="line-clamp-3 text-xs leading-snug text-surface-container-on/70">
                      {{ resourceMenu.description }}
                    </p>
                  </a>
                </div>
                <div class="basis-1/2">
                  <img
                    :src="ResourcesMenuUrl"
                    class="h-full w-auto rounded-lg"
                  />
                </div>
              </div>
            </LychenNavigationMenuContent>
          </LychenNavigationMenuItem>
          <LychenNavigationMenuItem>
            <LychenNavigationMenuTrigger>{{
              t(`${TRANSLATION_KEY}.navigation.community.title`)
            }}</LychenNavigationMenuTrigger>
            <LychenNavigationMenuContent
              class="bg-surface-container/70 text-surface-container-on backdrop-blur-lg"
            >
              <div class="flex flex-row gap-4 p-6 md:w-[400px]">
                <div class="flex flex-col items-stretch gap-2 basis-1/2">
                  <a
                    v-for="communityMenu in communityMenuList"
                    :key="communityMenu.title"
                    :href="communityMenu.link"
                    target="_blank"
                    class="cursor-pointer h-full select-none flex flex-col gap-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-surface-container-high hover:text-surface-container-high-on focus:bg-surface-container-high focus:text-surface-container-high-on"
                  >
                    <p class="text-md font-black font-lexend leading-none tracking-wide">
                      {{ communityMenu.title }}
                    </p>
                    <p class="line-clamp-3 text-xs leading-snug text-surface-container-on/70">
                      {{ communityMenu.description }}
                    </p>
                  </a>
                </div>
                <div class="basis-1/2">
                  <img
                    :src="CommunityMenuUrl"
                    class="h-full w-auto rounded-lg"
                  />
                </div>
              </div>
            </LychenNavigationMenuContent>
          </LychenNavigationMenuItem>
          <LychenNavigationMenuItem>
            <LychenNavigationMenuLink :class="navigationMenuTriggerStyle()">
              <RouterLink :to="{ name: RoutePagePrice.name }"
                >{{ t(`${TRANSLATION_KEY}.navigation.price.title`) }}
              </RouterLink>
            </LychenNavigationMenuLink>
          </LychenNavigationMenuItem>
        </LychenNavigationMenuList>
      </LychenNavigationMenu>
    </div>

    <div class="flex flex-row items-center gap-4">
      <LychenThemeSwitcher />
      <a
        href="https://github.com/alpsify/lychen"
        trget="_blank"
      >
        <LychenIcon
          icon="github"
          :fashion="LYCHEN_ICON_FASHION.Brands"
        />
      </a>
      <a
        href="https://discord.gg/FSMbXt5gr4"
        trget="_blank"
      >
        <LychenIcon
          icon="discord"
          :fashion="LYCHEN_ICON_FASHION.Brands"
        />
      </a>
    </div>
  </div>
</template>

<script setup lang="ts">
import CommunityMenuUrl from './assets/community-menu.webp';
import ResourcesMenuUrl from './assets/resources-menu.webp';
import { navigationMenuTriggerStyle } from '@lychen/ui-components/navigation-menu';
import { defineAsyncComponent } from 'vue';
import { TRANSLATION_KEY as GLOBAL_TRANSLATION_KEY } from '@lychen/ui-i18n/global';
import { RoutePageHome } from '@pages/home';

import { useApplications } from '@/composables/application/useApplications';
import { RoutePagePrice } from '@/pages/price';

import { TRANSLATION_KEY, useTranslations } from './i18n';

import { LYCHEN_ICON_FASHION } from '@lychen/ui-components/icon';
import { useCommunityMenu, useResourcesMenu } from '.';

const LychenThemeSwitcher = defineAsyncComponent(
  () => import('@lychen/ui-components/theme-switcher/LychenThemeSwitcher.vue'),
);

const LychenLogo = defineAsyncComponent(() => import('@lychen/ui-components/logo/LychenLogo.vue'));
const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));
const LychenNavigationMenu = defineAsyncComponent(
  () => import('@lychen/ui-components/navigation-menu/LychenNavigationMenu.vue'),
);
const LychenNavigationMenuContent = defineAsyncComponent(
  () => import('@lychen/ui-components/navigation-menu/LychenNavigationMenuContent.vue'),
);
const LychenNavigationMenuItem = defineAsyncComponent(
  () => import('@lychen/ui-components/navigation-menu/LychenNavigationMenuItem.vue'),
);

const LychenNavigationMenuLink = defineAsyncComponent(
  () => import('@lychen/ui-components/navigation-menu/LychenNavigationMenuLink.vue'),
);

const LychenNavigationMenuList = defineAsyncComponent(
  () => import('@lychen/ui-components/navigation-menu/LychenNavigationMenuList.vue'),
);

const LychenNavigationMenuTrigger = defineAsyncComponent(
  () => import('@lychen/ui-components/navigation-menu/LychenNavigationMenuTrigger.vue'),
);

const { t } = useTranslations();

const { applicationsList } = useApplications();

const { communityMenuList } = useCommunityMenu();
const { resourcesMenuList } = useResourcesMenu();
</script>

<style lang="css" scoped></style>
