<template>
  <ToggleGroupRoot
    v-bind="forwarded"
    :class="cn('flex items-center justify-center gap-1', props.class)"
  >
    <slot />
  </ToggleGroupRoot>
</template>

<script setup lang="ts">
import type { toggleVariants } from '../toggle';
import type { VariantProps } from 'class-variance-authority';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import {
  ToggleGroupRoot,
  type ToggleGroupRootEmits,
  type ToggleGroupRootProps,
  useForwardPropsEmits,
} from 'reka-ui';
import { computed, type HTMLAttributes, provide } from 'vue';

type ToggleGroupVariants = VariantProps<typeof toggleVariants>;

const props = defineProps<
  ToggleGroupRootProps & {
    class?: HTMLAttributes['class'];
    variant?: ToggleGroupVariants['variant'];
    size?: ToggleGroupVariants['size'];
  }
>();
const emits = defineEmits<ToggleGroupRootEmits>();

provide('toggleGroup', {
  variant: props.variant,
  size: props.size,
});

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;
  return delegated;
});

const forwarded = useForwardPropsEmits(delegatedProps, emits);
</script>
