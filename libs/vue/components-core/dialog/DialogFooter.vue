<template>
  <div :class="cn('flex flex-col-reverse sm:flex-row sm:justify-end sm:gap-x-2', props.class)">
    <slot />
  </div>
</template>

<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';

const props = defineProps<{ class?: HTMLAttributes['class'] }>();
</script>
