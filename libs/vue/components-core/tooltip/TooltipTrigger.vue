<template>
  <TooltipTrigger v-bind="props">
    <slot />
  </TooltipTrigger>
</template>

<script setup lang="ts">
import { TooltipTrigger, type TooltipTriggerProps } from 'reka-ui';

const props = defineProps<TooltipTriggerProps>();
</script>
