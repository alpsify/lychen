<template>
  <div class="mt-4 flex w-full flex-col items-stretch justify-start gap-2">
    <div class="flex flex-row items-stretch mb-5">
      <LychenLogo />
    </div>

    <div class="text-lg font-bold">
      <RouterLink :to="{ name: RouteViewHome.name }"
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
    <div class="text-lg font-bold">
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
import { DialogClose } from 'radix-vue';

const LychenLogo = defineAsyncComponent(() => import('@lychen/ui-components/logo/LychenLogo.vue'));
const LychenIcon = defineAsyncComponent(() => import('@lychen/ui-components/icon/LychenIcon.vue'));

const { t } = useTranslations();

const { applicationsList } = useApplications();
</script>

<style lang="css" scoped></style>
