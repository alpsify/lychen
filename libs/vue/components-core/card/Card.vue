<template>
  <Primitive
    :as="as"
    :class="
      cn(
        'flex flex-col rounded-3xl p-6 bg-surface-container-low text-on-surface-container duration-300 ease-in-out',
        hoverable ? 'hover:shadow-md hover:shadow-on-surface/10 cursor-pointer' : '',
        props.class,
      )
    "
  >
    <slot />
  </Primitive>
</template>

<script setup lang="ts">
import { Primitive, type PrimitiveProps } from 'reka-ui';
import type { HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-utils/tailwind/Cn';

interface Props extends PrimitiveProps {
  class?: HTMLAttributes['class'];
  hoverable?: boolean;
}
const props = withDefaults(defineProps<Props>(), {
  as: 'div',
  class: undefined,
  hoverable: false,
});
</script>
