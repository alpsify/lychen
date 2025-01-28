<script setup lang="ts">
import { defineAsyncComponent } from 'vue';
import { usePreferredColorScheme } from '@lychen/vue-util-composables/usePreferredColorScheme';

const LychenTooltipProvider = defineAsyncComponent(
  () => import('@lychen/ui-components/tooltip/LychenTooltipProvider.vue'),
);

usePreferredColorScheme();
</script>

<template>
  <LychenTooltipProvider>
    <RouterView />
  </LychenTooltipProvider>
</template>
