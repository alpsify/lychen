<template>
  <div class="flex flex-col gap-6">
    <div
      v-for="(menuSection, sectionName) in menuStructure"
      :key="sectionName"
      class="flex flex-col gap-2"
    >
      <h3
        v-if="menuSection.title"
        class="text-on-surface-container-low/40 uppercase font-medium text-xs"
      >
        {{ menuSection.title }}
      </h3>
      <RouterLink
        v-for="(menu, index) in menuSection.list"
        :key="index"
        :to="menu.to"
        class="menu-item flex flex-row items-center justify-start gap-4 px-4 py-2 rounded-xl hover:bg-surface-container-highest"
      >
        <Icon
          :icon="menu.icon"
          class="w-5 h-5 shrink-0"
        />
        <span>{{ menu.title }}</span>
      </RouterLink>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { Icon } from '@lychen/vue-ui-components-core/icon';
import type { MenuStructure } from '.';

defineProps<{
  menuStructure: MenuStructure;
}>();
</script>

<style>
.menu-item.router-link-active {
  background-color: var(--color-surface);
}
</style>
