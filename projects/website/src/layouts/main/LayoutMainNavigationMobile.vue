<template>
  <div class="mt-4 flex w-full flex-col items-stretch justify-start gap-4">
    <RouterLink
      :to="{ name: RouteViewHome.name }"
      class="flex h-10 flex-row items-stretch"
    >
      <LychenLogo
    /></RouterLink>
    <div class="text-lg font-bold opacity-50">
      {{ t(`${TRANSLATION_KEY}.navigation.app.title`) }}
    </div>

    <ul class="flex flex-col gap-2">
      <li
        v-for="application in applicationsList"
        :key="application.title"
      >
        <LychenNavigationMenuLink as-child>
          <div
            :href="application.link"
            target="_blank"
            class="flex select-none flex-row items-center gap-2 space-y-1 rounded-md bg-surface-container-high/50 p-2 leading-none no-underline outline-none transition-colors hover:bg-surface-container-high hover:text-surface-container-high-on focus:bg-surface-container-high focus:text-surface-container-high-on"
          >
            <img
              :src="`/logos/${application.logo}`"
              class="size-8"
            />
            <div class="flex flex-col gap-1">
              <p class="flex flex-row items-center gap-2 text-sm font-bold leading-none">
                {{ application.title }}
                <LychenBadge variant="tertiary"
                  >{{ t(`${TRANSLATION_KEY}.navigation.app.state.${application.state}`) }}
                </LychenBadge>
              </p>
              <p class="line-clamp-3 text-xs leading-snug text-surface-container-on/70">
                {{ application.description }}
              </p>
            </div>
          </div>
        </LychenNavigationMenuLink>
      </li>
    </ul>
    <div class="font-bold">
      <RouterLink :to="{ name: RouteViewPrice.name }"
        >{{ t(`${TRANSLATION_KEY}.navigation.price.title`) }}
      </RouterLink>
    </div>
  </div>
</template>

<script setup lang="ts">
import LychenNavigationMenuLink from '@lychen/ui-components/navigation-menu/LychenNavigationMenuLink.vue';
import { useApplications } from '@/composables/application/useApplications';

import { TRANSLATION_KEY, useTranslations } from './i18n';
import { RouteViewPrice } from '@/views/price';
import { RouteViewHome } from '@/views/home';
import { defineAsyncComponent } from 'vue';

const LychenLogo = defineAsyncComponent(() => import('@lychen/ui-components/logo/LychenLogo.vue'));

const { t } = useTranslations();

const { applicationsList } = useApplications();
</script>

<style lang="css" scoped></style>
