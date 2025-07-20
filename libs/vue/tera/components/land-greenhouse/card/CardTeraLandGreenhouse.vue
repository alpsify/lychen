<template>
  <div
    class="p-4 rounded-3xl bg-surface-container-high text-on-surface-container h-full flex flex-row gap-4 justify-between items-center active:bg-surface-container-highest"
  >
    <div class="flex flex-col gap-1">
      <span class="whitespace-nowrap overflow-hidden text-ellipsis text-sm"
        >{{ landGreenhouse.name }}
      </span>
    </div>
  </div>
</template>

<script lang="ts" setup>
import type { components } from '@lychen/typescript-tera-api-sdk/generated/tera-api';
import { VARIANT, type Variant } from '.';

const { variant = VARIANT.Default, landGreenhouse } = defineProps<{
  landGreenhouse: components['schemas']['LandGreenhouse.jsonld'];
  variant?: Variant;
}>();
</script>
