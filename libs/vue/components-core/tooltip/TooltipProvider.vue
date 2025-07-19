<template>
  <TooltipProvider
    v-bind="props"
    :delay-duration="200"
    :skip-delay-duration="200"
  >
    <slot />
  </TooltipProvider>
</template>

<script setup lang="ts">
import { TooltipProvider, type TooltipProviderProps } from 'reka-ui';

const props = defineProps<TooltipProviderProps>();
</script>
