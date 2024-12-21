<template>
  <div :class="cn('grid md:auto-rows-[18rem] grid-cols-1 md:grid-cols-3 gap-4', props.class)">
    <slot />
  </div>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-util-tailwind/Cn';

const props = defineProps<{
  class: string;
}>();
</script>
