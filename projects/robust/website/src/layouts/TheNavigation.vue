<template>
  <LychenNavigationMenu class="hidden lg:flex">
    <LychenNavigationMenuList>
      <LychenNavigationMenuItem> </LychenNavigationMenuItem>
    </LychenNavigationMenuList>
  </LychenNavigationMenu>
</template>

<script setup lang="ts">
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

import LychenNavigationMenu from '@lychen/ui-components/navigation-menu/LychenNavigationMenu.vue';
import LychenNavigationMenuList from '@lychen/ui-components/navigation-menu/LychenNavigationMenuList.vue';
import LychenNavigationMenuItem from '@lychen/ui-components/navigation-menu/LychenNavigationMenuItem.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
