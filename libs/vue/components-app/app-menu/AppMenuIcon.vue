<template>
  <RouterLink
    :to="link"
    class="rounded-xl flex flex-col items-center gap-1"
  >
    <img
      :src="`/logos/${id}/logo.png`"
      class="rounded-xl w-12 h-12"
    />
    <span class="font-bold text-xs">{{ name }}</span>
  </RouterLink>
</template>

<script setup lang="ts">
defineProps<{ id: string; name: string; link: string }>();
</script>
