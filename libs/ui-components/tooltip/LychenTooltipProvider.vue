<script setup lang="ts">
import { TooltipProvider, type TooltipProviderProps } from "radix-vue";

const props = defineProps<TooltipProviderProps>();
</script>

<template>
  <TooltipProvider
    v-bind="props"
    :delay-duration="50"
    :skip-delay-duration="500"
  >
    <slot />
  </TooltipProvider>
</template>
