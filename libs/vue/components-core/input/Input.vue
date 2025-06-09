<script setup lang="ts">
import type { HTMLAttributes } from 'vue';
import { cn } from '@lychen/typescript-tailwind/Cn';
import { useVModel } from '@vueuse/core';
import { PRESETS } from '../utils/Preset';

const props = defineProps<{
  defaultValue?: string | number;
  modelValue?: string | number;
  class?: HTMLAttributes['class'];
}>();

const emits = defineEmits<{
  (e: 'update:modelValue', payload: string | number): void;
}>();

const modelValue = useVModel(props, 'modelValue', emits, {
  passive: true,
  defaultValue: props.defaultValue,
});
</script>

<template>
  <input
    v-model="modelValue"
    :class="
      cn(
        'flex min-h-10 w-full px-3 py-2 text-sm file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-on-surface/40 disabled:cursor-not-allowed disabled:opacity-50',
        PRESETS.FocusOutline,
        PRESETS.InputField,
        props.class,
      )
    "
  />
</template>
