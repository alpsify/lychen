<script setup lang="ts">
import { TooltipArrow } from 'radix-vue';
</script>

<template>
  <TooltipArrow
    class="TooltipArrow"
    :width="11"
    :height="5"
  />
</template>

<style>
.TooltipArrow {
	fill: rgb(var(--color-surface-container-highest));
}
</style>
