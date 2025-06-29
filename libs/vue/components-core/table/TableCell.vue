<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';

const props = defineProps<{
  class?: HTMLAttributes['class'];
}>();
</script>

<template>
  <td :class="cn('p-0.5 align-middle [&:has([role=checkbox])]:pr-0', props.class)">
    <slot />
  </td>
</template>
