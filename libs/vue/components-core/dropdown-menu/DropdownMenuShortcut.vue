<template>
  <span :class="cn('ml-auto text-xs tracking-widest opacity-60', props.class)">
    <slot />
  </span>
</template>

<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';

const props = defineProps<{
  class?: HTMLAttributes['class'];
}>();
</script>
