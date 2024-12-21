<template>
  <p class="text-md font-black font-lexend leading-none tracking-wide">
    {{ value }}
  </p>
</template>

<script setup lang="ts">
defineProps<{ value: string }>();
</script>
