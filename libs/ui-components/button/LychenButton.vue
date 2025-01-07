<template>
  <Primitive
    :as="as"
    :as-child="asChild"
    :class="cn(buttonVariants({ variant, size }), props.class)"
    :aria-label="text"
  >
    <slot name="prepend"></slot>
    <slot>{{ text }}</slot>
    <slot name="append"></slot>
  </Primitive>
</template>

<script setup lang="ts">
import { Primitive, type PrimitiveProps } from 'radix-vue';
import type { HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { type ButtonVariants, buttonVariants } from '.';

interface Props extends PrimitiveProps {
  variant?: ButtonVariants['variant'];
  size?: ButtonVariants['size'];
  class?: HTMLAttributes['class'];
  text?: string;
}

const props = withDefaults(defineProps<Props>(), {
  as: 'button',
  size: undefined,
  variant: undefined,
  class: undefined,
  text: undefined,
});
</script>
