<template>
  <Primitive
    :as="calculatedAs"
    :class="cn(titleVariants({ variant }), props.class)"
    ><slot></slot
  ></Primitive>
</template>

<script lang="ts" setup>
import { type AsTag, Primitive, type PrimitiveProps } from 'reka-ui';
import { type Component, computed, type HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { type TitleVariants, titleVariants } from '.';

interface Props extends PrimitiveProps {
  variant?: TitleVariants['variant'];
  class?: HTMLAttributes['class'];
}

const props = withDefaults(defineProps<Props>(), {
  as: undefined,
  variant: undefined,
  class: undefined,
});

const calculatedAs = computed<AsTag | Component>(() => {
  if (props.as) {
    return props.as;
  }

  if (props.variant?.startsWith('h')) {
    return props.variant;
  }

  return 'h1';
});
</script>
