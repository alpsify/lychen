<script lang="ts" setup>
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { CalendarCell, type CalendarCellProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<CalendarCellProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <CalendarCell
    data-slot="calendar-cell"
    :class="
      cn(
        'relative p-0 text-center text-sm text-on-surface focus-within:relative focus-within:z-20 [&:has([data-selected])]:rounded-md [&:has([data-selected])]:bg-primary [&:has([data-selected])]:text-on-primary',
        props.class,
      )
    "
    v-bind="forwardedProps"
  >
    <slot />
  </CalendarCell>
</template>
