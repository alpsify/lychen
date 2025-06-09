<template>
  <RouterLink
    :to="to"
    class="menu-item flex flex-row items-center justify-start gap-4 px-4 py-2 rounded-xl hover:bg-surface-container-highest"
  >
    <Icon
      :icon="icon"
      class="w-5 h-5 shrink-0"
    />
    <span>{{ title }}</span>
  </RouterLink>
</template>

<script lang="ts" setup>
import { Icon } from '@lychen/vue-components-core/icon';
import type { MenuItem } from '.';

defineProps<MenuItem>();
</script>
