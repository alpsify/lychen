<template>
  <thead :class="cn('[&_tr]:border-b', props.class)">
    <slot />
  </thead>
</template>

<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';

const props = defineProps<{
  class?: HTMLAttributes['class'];
}>();
</script>
