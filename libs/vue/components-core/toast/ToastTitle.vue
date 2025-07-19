<template>
  <ToastTitle
    v-bind="delegatedProps"
    :class="cn('text-sm font-semibold', props.class)"
  >
    <slot />
  </ToastTitle>
</template>

<script setup lang="ts">
import { cn } from '@lychen/typescript-utils/tailwind/Cn';
import { ToastTitle, type ToastTitleProps } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';

const props = defineProps<ToastTitleProps & { class?: HTMLAttributes['class'] }>();

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>
