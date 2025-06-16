<template>
  <div class="flex flex-col gap-2">
    <span
      v-if="title"
      class="font-bold opacity-50 text-xs uppercase"
      >{{ title }}</span
    >
    <slot />
  </div>
</template>

<script lang="ts" setup>
import { type NavigationSection } from '.';

defineProps<NavigationSection>();
</script>
