<template>
  <CalendarHeadCell
    data-slot="calendar-head-cell"
    :class="cn('text-on-surface/60 rounded-md w-8 font-normal text-[0.8rem]', props.class)"
    v-bind="forwardedProps"
  >
    <slot />
  </CalendarHeadCell>
</template>

<script lang="ts" setup>
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { CalendarHeadCell, type CalendarHeadCellProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<CalendarHeadCellProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>
