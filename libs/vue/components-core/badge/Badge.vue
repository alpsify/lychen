<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { VARIANT_VALUES, type VariantKey } from '.';

const { class: propsClass, variant = 'default' } = defineProps<{
  /**
   * Predefined variants
   */
  variant?: VariantKey;
  /**
   * CSS Class
   */
  class?: HTMLAttributes['class'];
}>();
</script>

<template>
  <div
    :class="
      cn(
        'flex flex-row items-center justify-center rounded-md px-2 py-1 text-xs gap-2 cursor-default',
        VARIANT_VALUES[variant],
        propsClass,
      )
    "
  >
    <slot />
  </div>
</template>
