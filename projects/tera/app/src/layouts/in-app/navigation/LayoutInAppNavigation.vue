<template>
  <nav class="flex items-center justify-center gap-6 bg-surface-container-low p-2">
    <LayoutInAppNavigationMenu
      v-for="(menu, index) in menus"
      :key="index"
      :menu="menu"
    />
  </nav>
</template>

<script setup lang="ts">
import { RoutePageDashboard } from '@/pages/dashboard';
import type { LayoutInAppNavigationMenu as MenuType } from '.';
import LayoutInAppNavigationMenu from './LayoutInAppNavigationMenu.vue';
import { faHouse } from '@fortawesome/pro-light-svg-icons/faHouse';
import { faClipboardListCheck } from '@fortawesome/pro-light-svg-icons/faClipboardListCheck';

const menus: MenuType[] = [
  {
    icon: faHouse,
    routeName: RoutePageDashboard.name,
    title: 'Accueil',
  },
  {
    icon: faClipboardListCheck,
    routeName: RoutePageDashboard.name,
    title: 'To Do',
  },
];
</script>
