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
import type { LayoutInAppNavigationMenu as MenuType } from '.';
import LayoutInAppNavigationMenu from './LayoutInAppNavigationMenu.vue';

const menus: MenuType[] = [
	{
		routeName: 'dashboard',
		icon: ['fal', 'objects-column'],
		title: 'Accueil',
	},
	{
		routeName: 'dashboard',
		icon: ['fal', 'store'],
		title: 'Mes AMAPs',
	},
	{
		routeName: 'user-profil',
		icon: ['fal', 'gear'],
		title: 'Réglages',
	},
];
</script>
