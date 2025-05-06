<template>
  <LayoutInApp
    :menu-structure="navigation"
    :application="{ name: 'Design System' }"
  >
    <template #header>
      <div class="flex flex-row justify-end gap-4 w-full p-4">
        <ThemeSwitcher />
        <LanguageSwitcher />
      </div>
    </template>
  </LayoutInApp>
</template>

<script lang="ts" setup>
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';
import LayoutInApp from '@lychen/vue-ui-layouts/in-app/LayoutInApp.vue';

import { RoutePageColors } from '@/pages/colors';
import { RoutePagePersonas } from '@/pages/personas';
import { TRANSLATION_KEY, messages } from './i18n';
import { RoutePageHome } from '@/pages/home';
import ThemeSwitcher from '@lychen/vue-ui-components-extra/theme-switcher/ThemeSwitcher.vue';
import LanguageSwitcher from '@lychen/vue-ui-components-extra/language-switcher/LanguageSwitcher.vue';
import { computed } from 'vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const navigation = computed(() => {
  return {
    first: {
      list: [
        {
          title: t('menu.home'),
          to: RoutePageHome,
        },
      ],
    },
    brand: {
      title: t('section.brand'),
      list: [
        {
          title: t('menu.personas'),
          to: RoutePagePersonas,
        },
        {
          title: t('menu.logos'),
          to: '',
        },
        {
          title: t('menu.images'),
          to: '',
        },
      ],
    },
    fundations: {
      title: t('section.foundations'),
      list: [
        {
          title: t('menu.colors'),
          to: RoutePageColors,
        },
      ],
    },
  };
});
</script>

<style scoped></style>
