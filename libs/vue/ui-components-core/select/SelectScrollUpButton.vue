<script setup lang="ts">
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { SelectScrollUpButton, type SelectScrollUpButtonProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';
import { Icon } from '../icon';
import { faChevronUp } from '@fortawesome/pro-light-svg-icons/faChevronUp';

const props = defineProps<SelectScrollUpButtonProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <SelectScrollUpButton
    data-slot="select-scroll-up-button"
    v-bind="forwardedProps"
    :class="cn('flex cursor-default items-center justify-center py-1', props.class)"
  >
    <slot>
      <Icon
        :icon="faChevronUp"
        class="size-4"
      />
    </slot>
  </SelectScrollUpButton>
</template>
