<template>
  <LychenNavigationMenu class="hidden lg:flex">
    <LychenNavigationMenuList>
      <LychenNavigationMenuItem>
        <LychenNavigationMenuLink
          :class="navigationMenuTriggerStyle()"
          class="hover:bg-primary-container/30 hover:text-primary-container-on"
        >
          <RouterLink to="#features">{{ t(`navigation.features.title`) }} </RouterLink>
        </LychenNavigationMenuLink>
      </LychenNavigationMenuItem>
    </LychenNavigationMenuList>
  </LychenNavigationMenu>
</template>

<script setup lang="ts">
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

import { navigationMenuTriggerStyle } from '@lychen/ui-components/navigation-menu';
import LychenNavigationMenu from '@lychen/ui-components/navigation-menu/LychenNavigationMenu.vue';
import LychenNavigationMenuList from '@lychen/ui-components/navigation-menu/LychenNavigationMenuList.vue';
import LychenNavigationMenuItem from '@lychen/ui-components/navigation-menu/LychenNavigationMenuItem.vue';
import LychenNavigationMenuLink from '@lychen/ui-components/navigation-menu/LychenNavigationMenuLink.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
