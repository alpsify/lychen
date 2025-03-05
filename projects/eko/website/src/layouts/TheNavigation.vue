<template>
  <NavigationMenu class="hidden lg:flex">
    <NavigationMenuList>
      <NavigationMenuItem>
        <RouterLink to="#features">
          <NavigationMenuLink
            as="div"
            :class="navigationMenuTriggerStyle()"
            class="hover:bg-primary-container/30 hover:text-on-primary-container"
          >
            {{ t(`navigation.features.title`) }}
          </NavigationMenuLink>
        </RouterLink>
      </NavigationMenuItem>
    </NavigationMenuList>
  </NavigationMenu>
</template>

<script setup lang="ts">
import { messages, TRANSLATION_KEY } from './i18n';
import { useI18nExtended } from '@lychen/vue-i18n-util-composables/useI18nExtended';

import { navigationMenuTriggerStyle } from '@lychen/vue-ui-components-core/navigation-menu';
import NavigationMenu from '@lychen/vue-ui-components-core/navigation-menu/NavigationMenu.vue';
import NavigationMenuList from '@lychen/vue-ui-components-core/navigation-menu/NavigationMenuList.vue';
import NavigationMenuItem from '@lychen/vue-ui-components-core/navigation-menu/NavigationMenuItem.vue';
import NavigationMenuLink from '@lychen/vue-ui-components-core/navigation-menu/NavigationMenuLink.vue';

const { t } = useI18nExtended({ messages, rootKey: TRANSLATION_KEY, prefixed: true });
</script>

<style lang="css" scoped></style>
