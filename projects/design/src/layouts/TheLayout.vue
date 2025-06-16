<template>
  <LayoutInAppRoot>
    <LayoutInAppSideNavigation class="flex flex-col justify-between">
      <LayoutInAppSideNavigationHeader class="flex flex-row gap-2 items-center">
        <LogoLychenIconOnly class="w-8 h-8" />
        <div class="flex flex-col">
          <span class="font-lexend font-bold text-lg">Design</span>
          <span class="text-sm opacity-60 -mt-1">by Lychen</span>
        </div>
      </LayoutInAppSideNavigationHeader>
      <div class="flex flex-col gap-4">
        <LayoutInAppSideNavigationSection
          v-for="(section, indexSections) in navigation"
          :key="indexSections"
          :title="section.title"
        >
          <template v-if="section.items">
            <LayoutInAppSideNavigationItem
              v-for="(item, indexItems) in section.items"
              :key="indexItems"
              v-bind="item"
            />
          </template>
        </LayoutInAppSideNavigationSection>
      </div>
      <LayoutInAppSideNavigationFooter>
        <a href="https://lychen.fr"
          >lychen.fr
          <Icon
            :icon="faArrowUpRight"
            class="text-xs opacity-80"
        /></a>
      </LayoutInAppSideNavigationFooter>
    </LayoutInAppSideNavigation>
    <LayoutInAppContent />
    <LayoutInAppHeader>
      <div class="flex flex-row justify-end gap-4 w-full p-4">
        <ThemeSwitcher />
        <LanguageSwitcher />
      </div>
    </LayoutInAppHeader>
  </LayoutInAppRoot>
</template>

<script lang="ts" setup>
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';

import { RoutePageColors } from '@/pages/colors';
import { RoutePagePersonas } from '@/pages/personas';
import { TRANSLATION_KEY, messages } from './i18n';
import { RoutePageHome } from '@/pages/home';
import ThemeSwitcher from '@lychen/vue-components-extra/theme-switcher/ThemeSwitcher.vue';
import LanguageSwitcher from '@lychen/vue-components-extra/language-switcher/LanguageSwitcher.vue';
import { computed } from 'vue';
import LayoutInAppRoot from './in-app/LayoutInAppRoot.vue';
import LayoutInAppSideNavigation from './in-app/LayoutInAppSideNavigation.vue';
import LayoutInAppSideNavigationItem from './in-app/LayoutInAppSideNavigationItem.vue';
import LayoutInAppSideNavigationSection from './in-app/LayoutInAppSideNavigationSection.vue';
import LayoutInAppHeader from './in-app/LayoutInAppHeader.vue';
import LayoutInAppContent from './in-app/LayoutInAppContent.vue';
import LayoutInAppSideNavigationHeader from './in-app/LayoutInAppSideNavigationHeader.vue';
import LayoutInAppSideNavigationFooter from './in-app/LayoutInAppSideNavigationFooter.vue';
import { faArrowUpRight } from '@fortawesome/pro-light-svg-icons';
import Icon from '@lychen/vue-components-core/icon/Icon.vue';
import { LogoLychenIconOnly } from '@lychen/vue-components-extra/logo-lychen';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });

const navigation = computed(() => {
  return [
    {
      items: [
        {
          label: t('menu.home'),
          to: RoutePageHome,
        },
      ],
    },
    {
      title: t('section.brand'),
      items: [
        {
          label: t('menu.personas'),
          to: RoutePagePersonas,
        },
      ],
    },
    {
      title: t('section.foundations'),
      items: [
        {
          label: t('menu.colors'),
          to: RoutePageColors,
        },
      ],
    },
  ];
});
</script>

<style scoped></style>
