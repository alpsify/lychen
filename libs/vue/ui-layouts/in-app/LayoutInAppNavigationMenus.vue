<template>
  <div class="flex flex-col gap-6">
    <div
      v-for="(menuSection, sectionName) in menuStructure"
      :key="sectionName"
      class="flex flex-col gap-2"
    >
      <div class="flex flex-row justify-between gap-4 items-center">
        <h3
          v-if="menuSection.title"
          class="text-on-surface-container-low/40 uppercase font-medium text-xs"
        >
          {{ menuSection.title }}
        </h3>
        <div :id="`${sectionName}-title-right`"></div>
      </div>
      <div
        :id="`${sectionName}-menu-section`"
        class="flex flex-col gap-2"
      >
        <LayoutInAppNavigationMenuItem
          v-for="(menu, index) in menuSection.list"
          :key="index"
          v-bind="menu"
        />
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import type { MenuStructure } from '.';
import LayoutInAppNavigationMenuItem from './LayoutInAppNavigationMenuItem.vue';

defineProps<{
  menuStructure: MenuStructure;
}>();
</script>

<style scoped>
.menu-item.router-link-active {
  background-color: var(--color-surface);
}
</style>
