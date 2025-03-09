<script setup lang="ts">
import { Icon } from '../icon';
import { faChevronRight } from '@fortawesome/pro-light-svg-icons';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { DropdownMenuSubTrigger, type DropdownMenuSubTriggerProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<DropdownMenuSubTriggerProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <DropdownMenuSubTrigger
    v-bind="forwardedProps"
    :class="
      cn(
        'flex cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none focus:bg-accent data-[state=open]:bg-accent',
        props.class,
      )
    "
  >
    <slot />
    <Icon
      :icon="faChevronRight"
      class="ml-auto h-4 w-4"
    />
  </DropdownMenuSubTrigger>
</template>
