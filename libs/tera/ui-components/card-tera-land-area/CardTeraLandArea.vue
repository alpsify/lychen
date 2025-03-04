<template>
  <div
    class="p-4 rounded-3xl bg-surface-container-high text-on-surface-container flex flex-row h-full gap-4 justify-between items-center active:bg-surface-container-highest"
  >
    <div class="flex flex-col gap-1">
      <span class="whitespace-nowrap overflow-hidden text-ellipsis text-sm"
        >{{ landArea.name }}
      </span>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { VARIANT, type Variant } from '.';

const { variant = VARIANT.Default, landArea } = defineProps<{
  landArea: {
    description?: string | null;
    name: string;
    state: string;
  };
  variant?: Variant;
}>();
</script>
