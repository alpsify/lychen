<template>
  <button
    :class="
      cn(
        'cursor-pointer inline-flex items-center justify-center whitespace-nowrap rounded-2xl text-sm font-medium transition-colors disabled:pointer-events-none disabled:opacity-50 gap-2',
        PRESETS.FocusOutline,
        VARIANT_VALUES[variant],
        SIZE_VALUES[size],
        props.class,
        `lychen-button ${innerRound ? 'lychen-button--round' : ''}`,
      )
    "
    :aria-label="label"
    :disabled="loading"
  >
    <Icon
      v-if="!loading && icon && iconPosition === ICON_POSITION.Start"
      :icon="icon"
    />
    <slot name="prepend" />
    <slot>{{ label }}</slot>
    <slot name="append" />
    <Icon
      v-if="!loading && icon && iconPosition === ICON_POSITION.End"
      :icon="icon"
    />
    <Icon
      v-if="loading"
      :icon="faSpinnerThird"
      class="fa-spin transition-opacity"
    />
  </button>
</template>

<script setup lang="ts">
import { computed, type HTMLAttributes, type VNode } from 'vue';
import { PRESETS } from '../utils/Preset';
import { cn } from '@lychen/typescript-util-tailwind/Cn';
import {
  ICON_POSITION,
  SIZE_VALUES,
  VARIANT_VALUES,
  type IconPosition,
  type VariantKey,
  type SizeKey,
} from '.';
import Icon from '../icon/Icon.vue';
import type { IconDefinition } from '@fortawesome/fontawesome-svg-core';
import { faSpinnerThird } from '@fortawesome/pro-light-svg-icons';

interface Props {
  /**
   * Text to display
   */
  label?: string;
  /**
   * Predefined variants
   */
  variant?: VariantKey;
  /**
   * Predefined sizes
   */
  size?: SizeKey;
  /**
   * CSS Class
   */
  class?: HTMLAttributes['class'];
  /**
   * Icon SVG definition
   */
  icon?: IconDefinition;
  /**
   * Position of the icon againts the label
   */
  iconPosition?: IconPosition;
  /**
   * Feedback for user clicking on the button, disable the button when active
   */
  loading?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
  size: 'default',
  variant: 'default',
  class: undefined,
  label: undefined,
  icon: undefined,
  iconPosition: ICON_POSITION.End,
  loading: false,
});

const innerRound = computed(() => {
  if (props.icon && !props.label) {
    return true;
  }

  return false;
});

defineSlots<{
  /**
   * Default slot for the label
   */
  default: () => VNode[];
  /**
   * Before the label
   */
  prepend: () => VNode[];
  /**
   * After the label
   */
  append: () => VNode[];
}>();
</script>

<style lang="css" scoped>
.lychen-button--round {
  aspect-ratio: 1/1;
  padding: calc(var(--spacing) * 2);
}
</style>
