<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { usePreferredColorScheme } from '@lychen/vue-composables/usePreferredColorScheme';
import Toaster from '@lychen/vue-ui-components-core/toast/Toaster.vue';

const TooltipProvider = defineAsyncComponent(
  () => import('@lychen/vue-ui-components-core/tooltip/TooltipProvider.vue'),
);

usePreferredColorScheme();
</script>

<template>
  <Toaster />
  <TooltipProvider>
    <RouterView />
  </TooltipProvider>
</template>
