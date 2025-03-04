<script setup lang="ts">
import type { RadioGroupItemProps } from 'radix-vue';
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { RadioGroupIndicator, RadioGroupItem, useForwardProps } from 'radix-vue';
import { computed } from 'vue';
import LychenIcon from '../icon/LychenIcon.vue';

const props = defineProps<RadioGroupItemProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <RadioGroupItem
    v-bind="forwardedProps"
    :class="
      cn(
        'peer aspect-square h-4 w-4 rounded-full border border-primary text-primary focus:outline-none disabled:cursor-not-allowed disabled:opacity-50',
        props.class,
      )
    "
  >
    <RadioGroupIndicator class="flex items-center justify-center">
      <LychenIcon
        icon="check"
        class="h-2.5 w-2.5 fill-current text-current"
      />
    </RadioGroupIndicator>
  </RadioGroupItem>
</template>
