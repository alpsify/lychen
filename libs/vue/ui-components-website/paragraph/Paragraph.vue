<template>
  <Primitive
    :as="as"
    :class="cn(paragraphVariants({ variant }), props.class)"
  >
    <slot />
  </Primitive>
</template>

<script lang="ts" setup>
import { Primitive, type PrimitiveProps } from 'reka-ui';
import { type HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { type ParagraphVariants, paragraphVariants } from '.';

interface Props extends PrimitiveProps {
  variant?: ParagraphVariants['variant'];
  class?: HTMLAttributes['class'];
}

const props = withDefaults(defineProps<Props>(), {
  as: 'p',
  variant: undefined,
  class: undefined,
});
</script>
