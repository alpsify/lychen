<template>
  <div class="flex flex-row gap-4 items-center justify-between w-full">
    <div class="flex flex-row gap-2 items-center">
      <RouterLink
        :to="{ name: RouteViewHome.name }"
        class="flex flex-row items-center gap-2">
        <LychenLogo
        />
      </RouterLink>
      <LychenNavigationMenu class="hidden lg:flex">
        <LychenNavigationMenuList>
          <LychenNavigationMenuItem>
            <LychenNavigationMenuTrigger>Applications</LychenNavigationMenuTrigger>
            <LychenNavigationMenuContent>
              <div class="p-6 flex flex-col items-stretch gap-2">
                <div
                  class="bg-surface-container-highest text-surface-container-highest-on rounded-md p-4 flex flex-row gap-4 items-center">
                  <LychenIcon icon="megaphone"/>
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
                <ul class="grid gap-3 md:w-[600px] lg:w-[800px] lg:grid-cols-3 md:grid-cols-2">
                  <li
                    v-for="application in applicationsList"
                    :key="application.title">
                    <LychenNavigationMenuLink as-child>
                      <a
                        :href="application.link"
                        target="_blank"
                        class="flex flex-row items-center gap-2 select-none space-y-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-surface-container-high hover:text-surface-container-high-on focus:bg-surface-container-high focus:text-surface-container-high-on">
                        <img
                          :src="`/logos/${application.logo}`"
                          class="size-8"/>
                        <div class="flex flex-col gap-1">
                          <p class="text-sm font-bold leading-none flex flex-row gap-2 items-center">
                            {{ application.title }}
                            <LychenBadge variant="tertiary">{{
                              t(`${TRANSLATION_KEY}.navigation.app.state.${application.state}`)
                              }}
                            </LychenBadge>
                          </p>
                          <p class="line-clamp-3 text-xs leading-snug text-surface-container-on/70">
                            {{ application.description }}
                          </p>
                        </div>
                      </a>
                    </LychenNavigationMenuLink>
                  </li>
                </ul>
              </div>
            </LychenNavigationMenuContent>
          </LychenNavigationMenuItem>
          <LychenNavigationMenuItem>
            <LychenNavigationMenuLink :class="navigationMenuTriggerStyle()">
              <RouterLink :to="{ name: RouteViewPrice.name }">{{
                t(`${TRANSLATION_KEY}.navigation.price.title`)
                }}
              </RouterLink>
            </LychenNavigationMenuLink>
          </LychenNavigationMenuItem>
        </LychenNavigationMenuList
        >
      </LychenNavigationMenu
      >
    </div>

    <LychenButton
      size="xs"
      variant="secondary"
    >{{ t(`${TRANSLATION_KEY}.navigation.soon`) }}
    </LychenButton
    >
  </div>
</template>

<script setup lang="ts">
import {navigationMenuTriggerStyle} from '@lychen/ui-components/navigation-menu';
import LychenNavigationMenuContent from '@lychen/ui-components/navigation-menu/LychenNavigationMenuContent.vue';
import LychenNavigationMenuItem from '@lychen/ui-components/navigation-menu/LychenNavigationMenuItem.vue';
import LychenNavigationMenuLink from '@lychen/ui-components/navigation-menu/LychenNavigationMenuLink.vue';
import LychenNavigationMenuList from '@lychen/ui-components/navigation-menu/LychenNavigationMenuList.vue';
import LychenNavigationMenuTrigger from '@lychen/ui-components/navigation-menu/LychenNavigationMenuTrigger.vue';
import {TRANSLATION_KEY as GLOBAL_TRANSLATION_KEY} from '@lychen/ui-i18n/global';
import {RouteViewHome} from '@views/home';
import {defineAsyncComponent} from 'vue';

import {useApplications} from '@/composables/application/useApplications';
import {RouteViewPrice} from '@/views/price';

import {TRANSLATION_KEY, useTranslations} from './i18n';

const LychenLogo = defineAsyncComponent(() => import('@lychen/ui-components/logo/LychenLogo.vue'));

const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const LychenNavigationMenu = defineAsyncComponent(
  () => import('@lychen/ui-components/navigation-menu/LychenNavigationMenu.vue'),
);

const LychenBadge = defineAsyncComponent(() => import('@lychen/ui-components/badge/LychenBadge.vue'));
const LychenButton = defineAsyncComponent(() => import('@lychen/ui-components/button/LychenButton.vue'));

const {t} = useTranslations();

const {applicationsList} = useApplications();
</script>

<style lang="css" scoped></style>
