<template>
  <ToggleGroupItem
    v-bind="forwardedProps"
    :class="
      cn(
        toggleVariants({
          variant: context?.variant || variant,
          size: context?.size || size,
        }),
        props.class,
      )
    "
  >
    <slot />
  </ToggleGroupItem>
</template>

<script setup lang="ts">
import type { VariantProps } from 'class-variance-authority';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { toggleVariants } from '../toggle';
import { ToggleGroupItem, type ToggleGroupItemProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes, inject } from 'vue';

type ToggleGroupVariants = VariantProps<typeof toggleVariants>;

const props = defineProps<
  ToggleGroupItemProps & {
    class?: HTMLAttributes['class'];
    variant?: ToggleGroupVariants['variant'];
    size?: ToggleGroupVariants['size'];
  }
>();

const context = inject<ToggleGroupVariants>('toggleGroup');

const delegatedProps = computed(() => {
  const { class: _, variant, size, ...delegated } = props;
  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>
