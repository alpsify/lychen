<template>
  <div class="flex flex-col p-2 rounded-xl">
    <p class="font-bold text-sm">{{ title }}</p>
    <p class="text-sm opacity-80">{{ description }}</p>
  </div>
</template>

<script lang="ts" setup>
import { type ApplicationFeature } from '@lychen/applications-util-model/ApplicationFeature';

defineProps<ApplicationFeature>();
</script>
