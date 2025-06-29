<script lang="ts" setup>
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { VARIANT_VALUES } from '../button';
import { CalendarCellTrigger, type CalendarCellTriggerProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = withDefaults(
  defineProps<CalendarCellTriggerProps & { class?: HTMLAttributes['class'] }>(),
  {
    as: 'button',
    class: undefined,
  },
);

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <CalendarCellTrigger
    data-slot="calendar-cell-trigger"
    :class="
      cn(
        VARIANT_VALUES['ghost'],
        'size-8 p-0 font-normal aria-selected:opacity-100 cursor-pointer rounded-md',
        '[&[data-today]:not([data-selected])]:bg-surface-container [&[data-today]:not([data-selected])]:text-on-surface-container',
        // Selected
        'data-[selected]:bg-primary data-[selected]:text-on-primary data-[selected]:opacity-100 data-[selected]:hover:bg-primary data-[selected]:hover:text-on-primary data-[selected]:focus:bg-primary data-[selected]:focus:text-on-primary',
        // Disabled
        'data-[disabled]:text-on-surface/60 data-[disabled]:opacity-50',
        // Unavailable
        'data-[unavailable]:text-negative data-[unavailable]:line-through',
        // Outside months
        'data-[outside-view]:text-on-surface/60',
        props.class,
      )
    "
    v-bind="forwardedProps"
  >
    <slot />
  </CalendarCellTrigger>
</template>
