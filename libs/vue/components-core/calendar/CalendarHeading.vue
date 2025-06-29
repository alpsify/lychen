<script lang="ts" setup>
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { CalendarHeading, type CalendarHeadingProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<CalendarHeadingProps & { class?: HTMLAttributes['class'] }>();

defineSlots<{
  default: (props: { headingValue: string }) => unknown;
}>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <CalendarHeading
    v-slot="{ headingValue }"
    data-slot="calendar-heading"
    :class="cn('text-sm font-medium text-on-surface', props.class)"
    v-bind="forwardedProps"
  >
    <slot :heading-value>
      {{ headingValue }}
    </slot>
  </CalendarHeading>
</template>
