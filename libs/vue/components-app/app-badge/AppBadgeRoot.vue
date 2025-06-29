<template>
  <div :class="cn('app-badge-root flex flex-row gap-2 items-center justify-start', props.class)">
    <slot />
  </div>
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import type { HTMLAttributes } from 'vue';

const props = defineProps<{ class?: HTMLAttributes['class'] }>();
</script>
