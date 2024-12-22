<template>
  <p class="text-lg font-black font-lexend leading-none tracking-wide">
    {{ value }}
  </p>
</template>

<script setup lang="ts">
defineProps<{ value: string }>();
</script>
