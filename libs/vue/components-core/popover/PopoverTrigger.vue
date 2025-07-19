<template>
  <PopoverTrigger v-bind="props">
    <slot />
  </PopoverTrigger>
</template>

<script setup lang="ts">
import { PopoverTrigger, type PopoverTriggerProps } from 'reka-ui';

const props = defineProps<PopoverTriggerProps>();
</script>
