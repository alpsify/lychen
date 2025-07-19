<template>
  <TooltipProvider>
    <RouterView />
  </TooltipProvider>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from 'vue';

const TooltipProvider = defineAsyncComponent(
  () => import('@lychen/vue-components-core/tooltip/TooltipProvider.vue'),
);
</script>
