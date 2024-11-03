<template>
  <div class="relative">
    <slot />
    <LychenRipple />
  </div>
</template>

<script setup lang="ts">
import LychenRipple from './LychenRipple.vue';
</script>
