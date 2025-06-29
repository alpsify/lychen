<template>
  <RouterLink
    :to="to"
    class="menu-item flex flex-row items-center justify-start gap-4 px-3 -mx-3 py-2 rounded-xl hover:bg-surface-container-highest"
  >
    <Icon
      v-if="icon"
      :icon="icon"
      class="w-5 h-5 shrink-0"
    />
    <span>{{ label }}</span>
  </RouterLink>
</template>

<script lang="ts" setup>
import { Icon } from '@lychen/vue-components-core/icon';
import { type NavigationItem } from '.';

defineProps<NavigationItem>();
</script>
