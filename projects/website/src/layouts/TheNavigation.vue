<template>
  <div class="flex w-full flex-row items-stretch justify-between gap-4">
    <RouterLink
      :to="RoutePageHome"
      class="flex flex-row items-stretch"
    >
      <LychenLogoFull class="hover:text-primary-container-on"
    /></RouterLink>
    <div class="flex flex-row items-stretch gap-2">
      <LychenNavigationMenu class="hidden lg:flex">
        <LychenNavigationMenuList>
          <LychenNavigationMenuItem>
            <LychenNavigationMenuTrigger>{{
              t(`navigation.app.title`)
            }}</LychenNavigationMenuTrigger>
            <LychenNavigationMenuContent>
              <div
                class="flex flex-col items-stretch gap-2 bg-surface-container/70 text-surface-container-on backdrop-blur-lg"
              >
                <div
                  class="flex flex-row items-center gap-4 bg-surface-container-highest p-4 text-surface-container-highest-on"
                >
                  <LychenIcon icon="megaphone" />
                  <div class="flex flex-col gap-0">
                    <p class="text-sm">
                      {{ t(`navigation.app.menu.disclaimer.paragraph`) }}

                      <a
                        class="text-sm underline"
                        :href="`mailto:${EMAIL.Bonjour}`"
                        >{{ EMAIL.Bonjour }}</a
                      >
                    </p>
                  </div>
                </div>
                <div class="grid gap-4 md:w-[600px] md:grid-cols-2 lg:w-[800px] lg:grid-cols-3 p-6">
                  <LychenNavigationMenuSubLink
                    v-for="application in opiniatedApplicationsList"
                    v-bind="application"
                    :key="application.title"
                  />
                </div>
              </div>
            </LychenNavigationMenuContent>
          </LychenNavigationMenuItem>

          <LychenNavigationMenuItem>
            <LychenNavigationMenuTrigger>{{
              t(`navigation.resources.title`)
            }}</LychenNavigationMenuTrigger>
            <LychenNavigationMenuContent>
              <div
                class="flex flex-row gap-2 md:w-[400px] bg-surface-container/70 text-surface-container-on backdrop-blur-lg"
              >
                <div class="flex flex-col justify-start items-stretch gap-2 basis-1/2 p-6">
                  <LychenNavigationMenuSubLink
                    v-for="resourceMenu in resourcesMenuList"
                    v-bind="resourceMenu"
                    :key="resourceMenu.title"
                  />
                </div>
                <div class="basis-1/2">
                  <img
                    :src="ResourcesMenuUrl"
                    class="h-full w-auto"
                  />
                </div>
              </div>
            </LychenNavigationMenuContent>
          </LychenNavigationMenuItem>
          <LychenNavigationMenuItem>
            <LychenNavigationMenuTrigger>{{
              t(`navigation.community.title`)
            }}</LychenNavigationMenuTrigger>
            <LychenNavigationMenuContent>
              <div
                class="flex flex-row gap-4 md:w-[400px] bg-surface-container/70 text-surface-container-on backdrop-blur-lg"
              >
                <div class="flex flex-col items-stretch gap-2 basis-1/2 p-6">
                  <LychenNavigationMenuSubLink
                    v-for="communityMenu in communityMenuList"
                    v-bind="communityMenu"
                    :key="communityMenu.title"
                  />
                </div>
                <div class="basis-1/2">
                  <img
                    :src="CommunityMenuUrl"
                    class="h-full w-auto"
                  />
                </div>
              </div>
            </LychenNavigationMenuContent>
          </LychenNavigationMenuItem>

          <LychenNavigationMenuItem>
            <RouterLink :to="RoutePagePrice">
              <LychenNavigationMenuLink
                as="div"
                :class="navigationMenuTriggerStyle()"
                class="hover:bg-primary-container/30 hover:text-primary-container-on"
              >
                {{ t(`navigation.price.title`) }}
              </LychenNavigationMenuLink>
            </RouterLink>
          </LychenNavigationMenuItem>

          <LychenNavigationMenuItem>
            <RouterLink :to="RoutePageSponsor">
              <LychenNavigationMenuLink
                as="div"
                :class="navigationMenuTriggerStyle()"
                class="hover:bg-primary-container/30 hover:text-primary-container-on"
              >
                {{ t(`navigation.sponsor.title`) }}
              </LychenNavigationMenuLink>
            </RouterLink>
          </LychenNavigationMenuItem>
        </LychenNavigationMenuList>
      </LychenNavigationMenu>
    </div>

    <div class="flex flex-row items-center gap-4">
      <LychenThemeSwitcher />
      <a
        :href="SOCIAL_LINK.GitHub"
        target="_blank"
        aria-label="GitHub"
      >
        <LychenIcon
          icon="github"
          :fashion="LYCHEN_ICON_FASHION.Brands"
        />
      </a>
      <a
        :href="SOCIAL_LINK.Discord"
        target="_blank"
        aria-label="Discord"
      >
        <LychenIcon
          icon="discord"
          :fashion="LYCHEN_ICON_FASHION.Brands"
        />
      </a>
      <WebsiteButtonTallyPreregister class="hidden md:flex" />
    </div>
  </div>
</template>

<script setup lang="ts">
import CommunityMenuUrl from './assets/community-menu.webp';
import ResourcesMenuUrl from './assets/resources-menu.webp';
import { navigationMenuTriggerStyle } from '@lychen/ui-components/navigation-menu';
import { defineAsyncComponent } from 'vue';
import { RoutePageHome } from '@pages/home';
import { useApplicationsCatalog } from '@lychen/applications-util-composables/useApplicationsCatalog';
import { RoutePagePrice } from '@pages/price';
import { SOCIAL_LINK } from '@lychen/util-constants/Social';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

import { LYCHEN_ICON_FASHION } from '@lychen/ui-components/icon';
import { useCommunityMenu } from './composables/useCommunityMenu';
import { useResourcesMenu } from './composables/useResourcesMenu';
import { RoutePageSponsor } from '@pages/sponsor';
import { EMAIL } from '@lychen/util-constants/Email';
import WebsiteButtonTallyPreregister from '@lychen/website-ui-components/buttons/tally-preregister/WebsiteButtonTallyPreregister.vue';
import LychenLogoFull from '@lychen/ui-components/logo/LychenLogoFull.vue';

const LychenNavigationMenuSubLink = defineAsyncComponent(
  () => import('@lychen/ui-components/navigation-menu/LychenNavigationMenuSubLink.vue'),
);

const LychenThemeSwitcher = defineAsyncComponent(
  () => import('@lychen/ui-components/theme-switcher/LychenThemeSwitcher.vue'),
);

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

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { opiniatedApplicationsList } = useApplicationsCatalog();

const { communityMenuList } = useCommunityMenu();
const { resourcesMenuList } = useResourcesMenu();
</script>
