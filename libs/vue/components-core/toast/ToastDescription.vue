<template>
  <ToastDescription
    :class="cn('text-sm opacity-90', props.class)"
    v-bind="delegatedProps"
  >
    <slot />
  </ToastDescription>
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { ToastDescription, type ToastDescriptionProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<ToastDescriptionProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>
