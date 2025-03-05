<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { badgeVariants, type BadgeVariants } from '.';

const props = defineProps<{
  variant?: BadgeVariants['variant'];
  class?: HTMLAttributes['class'];
}>();
</script>

<template>
  <div :class="cn(badgeVariants({ variant }), props.class)">
    <slot />
  </div>
</template>
