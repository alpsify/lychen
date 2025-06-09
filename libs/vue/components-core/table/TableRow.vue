<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-tailwind/Cn';

const props = defineProps<{
  class?: HTMLAttributes['class'];
}>();
</script>

<template>
  <tr
    :class="
      cn(
        'border-b transition-colors hover:bg-on-surface/10 data-[state=selected]:bg-primary-container/50 border-on-surface/15 data-[state=selected]:border-primary-container/80',
        props.class,
      )
    "
  >
    <slot />
  </tr>
</template>
