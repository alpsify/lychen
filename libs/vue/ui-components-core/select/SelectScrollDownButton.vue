<script setup lang="ts">
import { cn } from '@lychen/typescript-tailwind/Cn';

import { SelectScrollDownButton, type SelectScrollDownButtonProps, useForwardProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';
import { Icon } from '../icon';
import { faChevronDown } from '@fortawesome/pro-light-svg-icons/faChevronDown';

const props = defineProps<SelectScrollDownButtonProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
  <SelectScrollDownButton
    data-slot="select-scroll-down-button"
    v-bind="forwardedProps"
    :class="cn('flex cursor-default items-center justify-center py-1', props.class)"
  >
    <slot>
      <Icon
        :icon="faChevronDown"
        class="size-4"
      />
    </slot>
  </SelectScrollDownButton>
</template>
