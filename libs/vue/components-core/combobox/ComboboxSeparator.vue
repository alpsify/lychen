<template>
  <ComboboxSeparator
    v-bind="delegatedProps"
    :class="cn('-mx-1 h-px bg-primary', props.class)"
  >
    <slot />
  </ComboboxSeparator>
</template>

<script setup lang="ts">
import type { ComboboxSeparatorProps } from 'reka-ui';
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { ComboboxSeparator } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<ComboboxSeparatorProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>
