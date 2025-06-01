<template>
  <NavigationMenu class="hidden lg:flex">
    <NavigationMenuList>
      <NavigationMenuItem> </NavigationMenuItem>
    </NavigationMenuList>
  </NavigationMenu>
</template>

<script setup lang="ts">
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-composables/useI18nExtended';

import NavigationMenu from '@lychen/vue-ui-components-core/navigation-menu/NavigationMenu.vue';
import NavigationMenuList from '@lychen/vue-ui-components-core/navigation-menu/NavigationMenuList.vue';
import NavigationMenuItem from '@lychen/vue-ui-components-core/navigation-menu/NavigationMenuItem.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
