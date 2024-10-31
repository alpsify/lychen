<script setup lang="ts">
import { defineAsyncComponent } from "vue";

const LychenTooltipProvider = defineAsyncComponent(
  () => import("@lychen/ui-components/tooltip/LychenTooltipProvider.vue"),
);
</script>

<template>
  <LychenTooltipProvider>
    <RouterView />
  </LychenTooltipProvider>
</template>
