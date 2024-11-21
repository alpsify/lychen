<template>
  <div class="mt-4 flex w-full flex-col items-stretch justify-start gap-2">
    <div class="flex flex-row items-stretch mb-5">
      <LychenLogo class="h-10" />
    </div>

    <div class="text-lg font-bold">
      <RouterLink :to="{ name: RoutePageHome.name }"
        >{{ t(`${TRANSLATION_KEY}.navigation.home.title`) }}
      </RouterLink>
    </div>
    <div class="text-lg font-bold opacity-50">
      {{ t(`${TRANSLATION_KEY}.navigation.app.title`) }}
    </div>

    <ul class="flex flex-col gap-1">
      <li
        v-for="application in applicationsList"
        :key="application.title"
      >
        <LychenNavigationMenuLink as-child>
          <div
            :href="application.link"
            target="_blank"
            class="select-none bg-surface-container/40 flex flex-col gap-1 rounded-md p-3 leading-none no-underline outline-none transition-colors hover:bg-surface-container-high hover:text-surface-container-high-on focus:bg-surface-container-high focus:text-surface-container-high-on"
          >
            <div class="flex flex-row gap-2 justify-between items-center">
              <p class="text-md font-black font-lexend leading-none tracking-wide lowercase">
                {{ application.title }}
              </p>
            </div>
            <p class="line-clamp-3 text-xs leading-snug text-surface-container-on/70">
              {{ application.description }}
            </p>
          </div>
        </LychenNavigationMenuLink>
      </li>
    </ul>
    <div class="flex flex-col gap-0">
      <p class="text-lg font-bold opacity-50">
        {{ t(`${TRANSLATION_KEY}.navigation.resources.title`) }}
      </p>
      <p class="text-md font-bold">
        <a href="">{{ t(`${TRANSLATION_KEY}.navigation.resources.blog.title`) }} </a>
      </p>
      <p class="text-md font-bold">
        <a href="">{{ t(`${TRANSLATION_KEY}.navigation.resources.project_dashboard.title`) }} </a>
      </p>
      <p class="text-md font-bold">
        <RouterLink :to="{ name: RoutePagePrice.name }"
          >{{ t(`${TRANSLATION_KEY}.navigation.resources.manifest.title`) }}
        </RouterLink>
      </p>
    </div>

    <div class="text-md font-bold">
      <RouterLink :to="{ name: RoutePagePrice.name }"
        >{{ t(`${TRANSLATION_KEY}.navigation.price.title`) }}
      </RouterLink>
    </div>
  </div>
</template>

<script setup lang="ts">
import LychenNavigationMenuLink from '@lychen/ui-components/navigation-menu/LychenNavigationMenuLink.vue';
import { useApplications } from '@/composables/application/useApplications';

import { TRANSLATION_KEY, useTranslations } from './i18n';
import { RoutePagePrice } from '@/pages/price';
import { RoutePageHome } from '@/pages/home';
import { defineAsyncComponent } from 'vue';

const LychenLogo = defineAsyncComponent(() => import('@lychen/ui-components/logo/LychenLogo.vue'));

const { t } = useTranslations();

const { applicationsList } = useApplications();
</script>

<style lang="css" scoped></style>
