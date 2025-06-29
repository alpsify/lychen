<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { NumberFieldInput } from 'reka-ui';
import { PRESETS } from '../utils/Preset';

const props = defineProps<{
  class?: HTMLAttributes['class'];
}>();
</script>

<template>
  <NumberFieldInput
    data-slot="input"
    :class="
      cn(
        'flex h-10 w-full py-2 text-sm text-center placeholder:text-on-surface/40 ',
        'disabled:cursor-not-allowed disabled:opacity-50',
        PRESETS.InputField,
        PRESETS.FocusOutline,
        props.class,
      )
    "
  />
</template>
