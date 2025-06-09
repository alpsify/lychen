<template>
  <span
    :class="
      cn('text-lg font-black font-lexend leading-none tracking-wide antialiased', props.class)
    "
  >
    {{ value }}
  </span>
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-tailwind/Cn';
import { type HTMLAttributes } from 'vue';

const props = defineProps<{ value: string; class?: HTMLAttributes['class'] }>();
</script>
