<script lang="ts" setup>
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { Primitive, type PrimitiveProps } from 'reka-ui';

const props = withDefaults(defineProps<PrimitiveProps & { class?: HTMLAttributes['class'] }>(), {
  as: 'a',
});
</script>

<template>
  <Primitive
    :as="as"
    :as-child="asChild"
    :class="cn('transition-colors hover:text-foreground', props.class)"
  >
    <slot />
  </Primitive>
</template>
