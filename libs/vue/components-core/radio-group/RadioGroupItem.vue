<template>
  <RadioGroupItem
    v-bind="forwardedProps"
    :class="
      cn(
        'peer cursor-pointer aspect-square h-4 w-4 rounded-full border border-on-surface/50 text-primary focus:outline-none disabled:cursor-not-allowed disabled:opacity-50',
        props.class,
      )
    "
  >
    <RadioGroupIndicator class="flex items-center justify-center">
      <Icon
        :icon="faCheck"
        class="h-2.5 w-2.5 fill-current text-current"
      />
    </RadioGroupIndicator>
  </RadioGroupItem>
</template>

<script setup lang="ts">
import type { RadioGroupItemProps } from 'reka-ui';
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { RadioGroupIndicator, RadioGroupItem, useForwardProps } from 'reka-ui';
import { computed } from 'vue';
import Icon from '../icon/Icon.vue';
import { faCheck } from '@fortawesome/pro-light-svg-icons/faCheck';

const props = defineProps<RadioGroupItemProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>
