<script setup lang="ts">
import { Primitive, type PrimitiveProps } from 'radix-vue';
import type { HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-util-tailwind/Cn';

interface Props extends PrimitiveProps {
  class?: HTMLAttributes['class'];
}
const props = withDefaults(defineProps<Props>(), {
  as: 'div',
  class: undefined,
});
</script>

<template>
  <Primitive
    :as="as"
    :class="
      cn(
        'flex flex-col rounded-lg bg-surface-container text-surface-container-on shadow-[2px_4px_16px_0px_rgba(var(--color-on-surface)/0.06)_inset]',
        props.class,
      )
    "
  >
    <slot />
  </Primitive>
</template>
