<template>
  <DropdownMenuItem
    v-bind="forwardedProps"
    :class="
      cn(
        'relative flex cursor-pointer select-none items-center rounded-sm gap-2 px-2 py-1.5 text-sm outline-none transition-colors focus:bg-surface-container focus:text-on-surface-container data-[disabled]:pointer-events-none data-[disabled]:opacity-50  [&>svg]:size-4 [&>svg]:shrink-0',
        inset && 'pl-8',
        props.class,
      )
    "
  >
    <Icon
      v-if="icon"
      :icon="icon"
    />
    <slot />
  </DropdownMenuItem>
</template>

<script setup lang="ts">
import type { IconDefinition } from '@fortawesome/fontawesome-svg-core';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { DropdownMenuItem, type DropdownMenuItemProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';
import { Icon } from '../icon';

const props = defineProps<
  DropdownMenuItemProps & {
    class?: HTMLAttributes['class'];
    inset?: boolean;
    icon?: IconDefinition;
  }
>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>
