<template>
  <NumberFieldDecrement
    data-slot="decrement"
    v-bind="forwarded"
    :class="
      cn(
        'absolute top-1/2 -translate-y-1/2 left-0 p-3 disabled:cursor-not-allowed disabled:opacity-20',
        props.class,
      )
    "
  >
    <slot>
      <Icon
        :icon="faMinus"
        class="h-4 w-4"
      />
    </slot>
  </NumberFieldDecrement>
</template>

<script setup lang="ts">
import type { NumberFieldDecrementProps } from 'reka-ui';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { NumberFieldDecrement, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';
import { faMinus } from '@fortawesome/pro-light-svg-icons/faMinus';
import Icon from '../icon/Icon.vue';

const props = defineProps<NumberFieldDecrementProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwarded = useForwardProps(delegatedProps);
</script>
