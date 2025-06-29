<template>
  <img
    v-if="src"
    class="rounded-xl h-[1.7lh]"
    :src
  />
</template>

<script setup lang="ts">
defineProps<{ src?: string }>();
</script>
