<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { NumberFieldInput } from 'reka-ui';

const props = defineProps<{
  class?: HTMLAttributes['class'];
}>();
</script>

<template>
  <NumberFieldInput
    data-slot="input"
    :class="
      cn(
        'flex h-10 w-full rounded-xl border border-on-surface/40 bg-surface py-2 text-sm text-center placeholder:text-on-surface/40 focus-visible:outline-none focus-visible:border-on-surface/70 disabled:cursor-not-allowed disabled:opacity-50',
        props.class,
      )
    "
  />
</template>
