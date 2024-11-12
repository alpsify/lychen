<script setup lang="ts">
import { usePrefersColorScheme } from '@lychen/vue-util-composables/usePrefersColorScheme';
import { defineAsyncComponent } from 'vue';

const LychenTooltipProvider = defineAsyncComponent(
  () => import('@lychen/ui-components/tooltip/LychenTooltipProvider.vue'),
);

usePrefersColorScheme();
</script>

<template>
  <LychenTooltipProvider>
    <RouterView />
  </LychenTooltipProvider>
</template>
