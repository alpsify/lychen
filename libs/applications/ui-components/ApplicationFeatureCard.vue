<template>
  <div class="flex flex-col gap-1 p-2 rounded-xl">
    <p class="font-bold">{{ title }}</p>
    <p class="text-sm">{{ description }}</p>
  </div>
</template>

<script lang="ts" setup>
import { ApplicationFeature } from '@lychen/applications-util-model/ApplicationFeature';

defineProps<ApplicationFeature>();
</script>
