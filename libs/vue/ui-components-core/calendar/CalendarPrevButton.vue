<script lang="ts" setup>
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { VARIANT_VALUES } from '../button';
import { CalendarPrev, type CalendarPrevProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';
import Icon from '../icon/Icon.vue';
import { faChevronLeft } from '@fortawesome/pro-light-svg-icons/faChevronLeft';

const props = defineProps<CalendarPrevProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <CalendarPrev
    data-slot="calendar-prev-button"
    :class="
      cn(
        VARIANT_VALUES['container-high'],
        'absolute left-1',
        'size-7 bg-transparent p-0 opacity-50 hover:opacity-100 rounded-md cursor-pointer',
        props.class,
      )
    "
    v-bind="forwardedProps"
  >
    <slot>
      <Icon
        :icon="faChevronLeft"
        class="size-4"
      />
    </slot>
  </CalendarPrev>
</template>
