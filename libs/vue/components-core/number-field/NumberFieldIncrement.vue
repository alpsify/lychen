<template>
  <NumberFieldIncrement
    data-slot="increment"
    v-bind="forwarded"
    :class="
      cn(
        'absolute top-1/2 -translate-y-1/2 right-0 disabled:cursor-not-allowed disabled:opacity-20 p-3',
        props.class,
      )
    "
  >
    <slot>
      <Icon
        :icon="faPlus"
        class="h-4 w-4"
      />
    </slot>
  </NumberFieldIncrement>
</template>

<script setup lang="ts">
import type { NumberFieldIncrementProps } from 'reka-ui';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { NumberFieldIncrement, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';
import { faPlus } from '@fortawesome/pro-light-svg-icons/faPlus';
import Icon from '../icon/Icon.vue';

const props = defineProps<NumberFieldIncrementProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwarded = useForwardProps(delegatedProps);
</script>
