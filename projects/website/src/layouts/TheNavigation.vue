<template>
  <div class="flex w-full flex-row items-stretch justify-between gap-4">
    <RouterLink
      :to="RoutePageHome"
      class="flex flex-row items-stretch"
    >
      <LogoLychenFull class="hover:text-on-primary-container"
    /></RouterLink>
    <div class="flex flex-row items-stretch gap-2">
      <NavigationMenu class="hidden lg:flex">
        <NavigationMenuList>
          <NavigationMenuItem>
            <NavigationMenuTrigger>{{ t(`navigation.app.title`) }}</NavigationMenuTrigger>
            <NavigationMenuContent>
              <div
                class="flex flex-col items-stretch gap-2 bg-surface-container/70 text-on-surface-container backdrop-blur-lg"
              >
                <div class="flex flex-row gap-4">
                  <div
                    class="basis-2/3 grid gap-4 md:w-[600px] md:grid-cols-2 lg:w-[800px] lg:grid-cols-2 p-6"
                  >
                    <NavigationMenuSubLink
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
                        <Button
                          :label="t('navigation.app.robust.button')"
                          :icon="faArrowUpRight"
                          class="self-start"
                      /></a>
                    </div>
                  </div>
                </div>
              </div>
            </NavigationMenuContent>
          </NavigationMenuItem>

          <NavigationMenuItem>
            <NavigationMenuTrigger>{{ t(`navigation.resources.title`) }}</NavigationMenuTrigger>
            <NavigationMenuContent>
              <div
                class="flex flex-row gap-2 md:w-[500px] bg-surface-container/70 text-on-surface-container backdrop-blur-lg"
              >
                <div class="flex flex-col items-stretch gap-4 basis-1/2 p-6">
                  <NavigationMenuSubLink
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
            </NavigationMenuContent>
          </NavigationMenuItem>
          <NavigationMenuItem>
            <NavigationMenuTrigger>{{ t(`navigation.community.title`) }}</NavigationMenuTrigger>
            <NavigationMenuContent>
              <div
                class="flex flex-row gap-4 md:w-[500px] bg-surface-container/70 text-on-surface-container backdrop-blur-lg"
              >
                <div class="flex flex-col items-stretch gap-4 basis-1/2 p-6">
                  <NavigationMenuSubLink
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
            </NavigationMenuContent>
          </NavigationMenuItem>

          <NavigationMenuItem>
            <RouterLink :to="RoutePagePrice">
              <NavigationMenuLink
                as="div"
                :class="navigationMenuTriggerStyle()"
                class="hover:bg-primary-container/30 hover:text-on-primary-container"
              >
                {{ t(`navigation.price.title`) }}
              </NavigationMenuLink>
            </RouterLink>
          </NavigationMenuItem>

          <NavigationMenuItem>
            <RouterLink :to="RoutePageSponsor">
              <NavigationMenuLink
                as="div"
                :class="navigationMenuTriggerStyle()"
                class="hover:bg-primary-container/30 hover:text-on-primary-container"
              >
                {{ t(`navigation.sponsor.title`) }}
              </NavigationMenuLink>
            </RouterLink>
          </NavigationMenuItem>
        </NavigationMenuList>
      </NavigationMenu>
    </div>

    <div class="flex flex-row items-center gap-4">
      <LanguageSwitcher />
      <ToggleColorScheme />
      <a
        :href="SOCIAL_LINK.GitHub"
        target="_blank"
        aria-label="GitHub"
      >
        <Icon :icon="faGithub" />
      </a>
      <a
        :href="SOCIAL_LINK.Discord"
        target="_blank"
        aria-label="Discord"
      >
        <Icon :icon="faDiscord" />
      </a>
      <ButtonTallyPreregister class="hidden md:flex" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { faGithub } from '@fortawesome/free-brands-svg-icons/faGithub';
import { faDiscord } from '@fortawesome/free-brands-svg-icons/faDiscord';
import CommunityMenuUrl from './assets/community-menu.webp';
import ResourcesMenuUrl from './assets/resources-menu.webp';
import { navigationMenuTriggerStyle } from '@lychen/vue-components-core/navigation-menu';
import { computed, defineAsyncComponent } from 'vue';
import { RoutePageHome } from '@/pages/home';
import { useApplicationsCatalog } from '@lychen/applications-composables/useApplicationsCatalog';
import { RoutePagePrice } from '@/pages/price';
import { SOCIAL_LINK } from '@lychen/typescript-constants/Social';
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n/composables/useI18nExtended';
import { faArrowUpRight } from '@fortawesome/pro-light-svg-icons/faArrowUpRight';

import { useCommunityMenu } from './composables/useCommunityMenu';
import { useResourcesMenu } from './composables/useResourcesMenu';
import { RoutePageSponsor } from '@/pages/sponsor';

import ButtonTallyPreregister from '@lychen/vue-components-website/button-tally-preregister/ButtonTallyPreregister.vue';
import LogoLychenFull from '@lychen/vue-components-extra/logo-lychen/LogoLychenFull.vue';
import { APPLICATION_ALIAS } from '@lychen/applications-constants/ApplicationAlias';
import Button from '@lychen/vue-components-core/button/Button.vue';

import ToggleColorScheme from '@lychen/vue-color-scheme/components/ToggleColorScheme.vue';

const LanguageSwitcher = defineAsyncComponent(
  () => import('@lychen/vue-components-extra/language-switcher/LanguageSwitcher.vue'),
);

const NavigationMenuSubLink = defineAsyncComponent(
  () => import('@lychen/vue-components-core/navigation-menu/NavigationMenuSubLink.vue'),
);

const Icon = defineAsyncComponent(() => import('@lychen/vue-components-core/icon/Icon.vue'));
const NavigationMenu = defineAsyncComponent(
  () => import('@lychen/vue-components-core/navigation-menu/NavigationMenu.vue'),
);
const NavigationMenuContent = defineAsyncComponent(
  () => import('@lychen/vue-components-core/navigation-menu/NavigationMenuContent.vue'),
);
const NavigationMenuItem = defineAsyncComponent(
  () => import('@lychen/vue-components-core/navigation-menu/NavigationMenuItem.vue'),
);

const NavigationMenuLink = defineAsyncComponent(
  () => import('@lychen/vue-components-core/navigation-menu/NavigationMenuLink.vue'),
);

const NavigationMenuList = defineAsyncComponent(
  () => import('@lychen/vue-components-core/navigation-menu/NavigationMenuList.vue'),
);

const NavigationMenuTrigger = defineAsyncComponent(
  () => import('@lychen/vue-components-core/navigation-menu/NavigationMenuTrigger.vue'),
);

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const { opiniatedApplicationsList, getAppInfo } = useApplicationsCatalog();

const { communityMenuList } = useCommunityMenu();
const { resourcesMenuList } = useResourcesMenu();

const robust = computed(() => getAppInfo(APPLICATION_ALIAS.Robust));
</script>
