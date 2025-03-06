<template>
  <div class="flex flex-col gap-6">
    <div
      v-for="(menuSection, sectionName) in menuStructure"
      :key="sectionName"
      class="flex flex-col gap-0"
    >
      <h3
        v-if="menuSection.title"
        class="text-on-surface-container-low/50 uppercase font-medium text-sm"
      >
        {{ menuSection.title }}
      </h3>
      <RouterLink
        v-for="(menu, index) in menuSection.list"
        :key="index"
        :to="menu.to"
        class="flex flex-row items-center gap-2 px-4 py-2 rounded-md hover:bg-surface-container-highest"
      >
        <Icon :icon="menu.icon" />
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
