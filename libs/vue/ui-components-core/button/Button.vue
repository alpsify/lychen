<template>
  <button
    :class="
      cn(
        buttonVariants({ variant, size }),
        props.class,
        `lychen-button ${innerRound ? 'lychen-button--round' : ''}`,
      )
    "
    :aria-label="text"
  >
    <Icon
      v-if="icon && iconPosition === ICON_POSITION.Start"
      :icon="icon"
    />
    <slot name="prepend"></slot>
    <slot>{{ text }}</slot>
    <slot name="append"></slot>
    <Icon
      v-if="icon && iconPosition === ICON_POSITION.End"
      :icon="icon"
    />
  </button>
</template>

<script setup lang="ts">
import { computed, type HTMLAttributes } from 'vue';

import { cn } from '@lychen/typescript-util-tailwind/Cn';
import { type ButtonVariants, buttonVariants, ICON_POSITION, type IconPosition } from '.';
import Icon from '../icon/Icon.vue';
import type { IconDefinition } from '@fortawesome/fontawesome-svg-core';

interface Props {
  variant?: ButtonVariants['variant'];
  size?: ButtonVariants['size'];
  class?: HTMLAttributes['class'];
  text?: string;
  icon?: IconDefinition;
  iconPosition?: IconPosition;
}

const props = withDefaults(defineProps<Props>(), {
  size: undefined,
  variant: undefined,
  class: undefined,
  text: undefined,
  icon: undefined,
  iconPosition: ICON_POSITION.End,
});

const innerRound = computed(() => {
  if (props.icon && !props.text) {
    return true;
  }

  return false;
});
</script>

<style lang="css" scoped>
.lychen-button--round {
  aspect-ratio: 1/1;
  padding: calc(var(--spacing) * 2);
}
</style>
