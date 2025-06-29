<template>
  <component
    :is="variant"
    :class="cn(baseHeadingVariants({ variant }), classProp)"
  >
    <slot />
  </component>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { baseHeadingVariants, type BaseHeadingVariants } from '.';
import type { HTMLAttributes } from 'vue';

interface Props {
  variant?: BaseHeadingVariants['variant'];
  class?: HTMLAttributes['class'];
}

const { class: classProp, variant = 'h1' } = defineProps<Props>();
</script>
