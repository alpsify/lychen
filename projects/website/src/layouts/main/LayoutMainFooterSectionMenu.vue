<template>
  <RouterLink
    class="text-sm opacity-80"
    :to="to"
  >
    {{ title }}</RouterLink
  >
</template>

<script setup lang="ts">
import type { RouteLocationAsPathGeneric, RouteLocationAsRelativeGeneric } from 'vue-router';

defineProps<{
  title: string;
  to: string | RouteLocationAsPathGeneric | RouteLocationAsRelativeGeneric;
}>();
</script>
