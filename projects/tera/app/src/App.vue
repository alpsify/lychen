<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { usePreferredColorScheme } from '@lychen/vue-util-composables/usePreferredColorScheme';

const TooltipProvider = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/tooltip/TooltipProvider.vue'),
);

usePreferredColorScheme();
</script>

<template>
  <TooltipProvider>
    <RouterView />
  </TooltipProvider>
</template>
