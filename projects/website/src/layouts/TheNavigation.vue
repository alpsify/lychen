<template>
  <div class="flex w-full flex-row items-stretch justify-between gap-4">
    <RouterLink
      :to="RoutePageHome"
      class="flex flex-row items-stretch"
    >
      <LychenLogoFull class="hover:text-on-primary-container"
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
                class="flex flex-col items-stretch gap-2 bg-surface-container/70 text-on-surface-container backdrop-blur-lg"
              >
                <!--<div
                  class="flex flex-row items-center gap-4 bg-surface-container-highest p-4 text-on-surface-container-highest"
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
                </div>-->
                <div class="flex flex-row gap-4">
                  <div
                    class="basis-2/3 grid gap-4 md:w-[600px] md:grid-cols-2 lg:w-[800px] lg:grid-cols-2 p-6"
                  >
                    <LychenNavigationMenuSubLink
                      v-for="application in opiniatedApplicationsList"
                      v-bind="application"
                      :key="application.title"
                    />
                  </div>

                  <div
                    class="relative bg-tertiary-container basis-1/3 rounded-3xl flex flex-col gap-2"
                  >
                    <img
                      class="absolute top-0 left-0 w-full h-full rounded-3xl opacity-50"
                      src="/applications-covers/robust-cover-1.webp"
                    />
                    <div
                      class="absolute bg-gradient-to-br from-tertiary-container to-tertiary-container/20 rounded-3xl top-0 left-0 w-full h-full z-20"
                    ></div>
                    <div class="text-on-surface z-20 flex flex-col gap-4 p-8">
                      <p class="text-md font-black font-lexend leading-none tracking-wide">
                        {{ robust.title }}
                      </p>
                      <p>{{ robust.description }}</p>

                      <a href="https://robust.lychen.fr">
                        <LychenButton
                          :text="t('navigation.app.robust.button')"
                          icon="arrow-up-right"
                          class="self-start"
                      /></a>
                    </div>
                  </div>
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
                class="flex flex-row gap-2 md:w-[500px] bg-surface-container/70 text-on-surface-container backdrop-blur-lg"
              >
                <div class="flex flex-col items-stretch gap-4 basis-1/2 p-6">
                  <LychenNavigationMenuSubLink
                    v-for="resourceMenu in resourcesMenuList"
                    v-bind="resourceMenu"
                    :key="resourceMenu.title"
                  />
                </div>
                <div class="basis-1/2">
                  <img
                    :src="ResourcesMenuUrl"
                    class="h-full w-auto max-h-[500px]"
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
                class="flex flex-row gap-4 md:w-[500px] bg-surface-container/70 text-on-surface-container backdrop-blur-lg"
              >
                <div class="flex flex-col items-stretch gap-4 basis-1/2 p-6">
                  <LychenNavigationMenuSubLink
                    v-for="communityMenu in communityMenuList"
                    v-bind="communityMenu"
                    :key="communityMenu.title"
                  />
                </div>
                <div class="basis-1/2">
                  <img
                    :src="CommunityMenuUrl"
                    class="h-full w-auto max-h-[500px]"
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
                class="hover:bg-primary-container/30 hover:text-on-primary-container"
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
                class="hover:bg-primary-container/30 hover:text-on-primary-container"
              >
                {{ t(`navigation.sponsor.title`) }}
              </LychenNavigationMenuLink>
            </RouterLink>
          </LychenNavigationMenuItem>
        </LychenNavigationMenuList>
      </LychenNavigationMenu>
    </div>

    <div class="flex flex-row items-center gap-4">
      <LychenLanguageSwitcher />
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
import { computed, defineAsyncComponent } from 'vue';
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

import WebsiteButtonTallyPreregister from '@lychen/website-ui-components/buttons/tally-preregister/WebsiteButtonTallyPreregister.vue';
import LychenLogoFull from '@lychen/ui-components/logo/LychenLogoFull.vue';
import { APPLICATION_ALIAS } from '@lychen/applications-util-constants/ApplicationAlias';
import LychenButton from '@lychen/ui-components/button/LychenButton.vue';

const LychenLanguageSwitcher = defineAsyncComponent(
  () => import('@lychen/ui-components/language-switcher/LychenLanguageSwitcher.vue'),
);

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

const { opiniatedApplicationsList, getAppInfo } = useApplicationsCatalog();

const { communityMenuList } = useCommunityMenu();
const { resourcesMenuList } = useResourcesMenu();

const robust = computed(() => getAppInfo(APPLICATION_ALIAS.Robust));
</script>
