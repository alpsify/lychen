<template>
  <div class="bg-surface-container p-4 rounded-md flex flex-col gap-2">
    <div class="flex flex-row justify-between items-center min-h-[40px]">
      <div class="flex flex-row gap-2 items-center">
        <slot name="state">
          <Badge>{{ state }}</Badge>
        </slot>
        <small class="opacity-50">{{ totalItems }}</small>
      </div>
      <div>
        <slot name="actions" />
      </div>
    </div>
    <div class="flex flex-col gap-2">
      <slot />
    </div>
  </div>
</template>

<script lang="ts" setup>
import { Badge } from '@lychen/vue-ui-components-core/badge';

defineProps<{
  state: string;
  totalItems?: number;
  closed?: boolean;
}>();
</script>
